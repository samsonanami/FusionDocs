BEGIN
   

SET @interest_rate_per=(SELECT lnp_max_interest FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);
SET @processing_fee=(SELECT lnp_max_processing_fee FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);
SET @insurance_fee=(SELECT lnp_max_insurance_fee FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);
SET @ln_interest=(NEW.ln_principal*(@interest_rate_per/100)*NEW.ln_duration);
SET NEW.ln_interest=@interest_rate_per;
SET NEW.ln_processing_fee_perc=@processing_fee;
SET NEW.ln_interest=@ln_interest;
SET NEW.ln_processing_fee=@processing_fee;
SET NEW.ln_name=NEW.ln_description;
SET @INCREMENT_DATE=(@ln_repayment_count*30);
SET @ln_due=DATE_ADD(NEW.ln_released, INTERVAL @INCREMENT_DATE DAY);
SET NEW.ln_maturity=DATE_ADD(NEW.ln_released, INTERVAL 30 DAY);

SET NEW.ln_balance=(NEW.ln_principal+@ln_interest);

SET @DUE_INCREMENT=NEW.ln_repayment_count*30;
SET NEW.ln_due = DATE_ADD(NEW.ln_released, INTERVAL @DUE_INCREMENT DAY);

    IF @bal = 0
      THEN
        SET NEW.ln_status = 2;
        SET NEW.ln_application_status = 1;
      END IF;

SET @interest_rate_per=(SELECT lnp_max_interest FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);

IF @repayment_count>0 THEN
    SET @INCREMENT = 0 ;
    SET @INCREMENT_DATE = 30;
    SET @PRINCIPAL=((NEW.ln_principal)/(NEW.ln_repayment_count));
    SET @INTEREST=(((@interest_rate_per)/(100))*(NEW.ln_repayment_count ));
    SET @DUE_AMT=((@PRINCIPAL)+(@INTEREST));

WHILE @INCREMENT<NEW.ln_repayment_count DO
		INSERT INTO `loanschedule`(`sch_date`, `sch_principal`, `sch_interest`, `sch_fee`, `sch_penalty_amount`, `sch_due_amt`, `sch_desc`, `sch_ln_id`) VALUES(DATE_ADD(NEW.ln_released, INTERVAL @INCREMENT_DATE DAY),@PRINCIPAL,@INTEREST,NEW.ln_fees,0,@DUE_AMT,'Repayment', NEW.ln_id);
       
    SET @INCREMENT = (@INCREMENT+1);
    SET @INCREMENT_DATE = @INCREMENT_DATE+30;
    END WHILE;
END IF;


END



=====================================================


BEGIN

SET @principal=(SELECT ln_principal FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1);
SET @balance=(SELECT ln_balance FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1);
SET @loan_paid=(SELECT ln_paid FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1);
 
  
SET @sch_unit=(SELECT sch_due_amt FROM loanschedule WHERE loanschedule.sch_ln_id=NEW.lnrp_ln_id AND sch_status=0 LIMIT 1);
SET @init_paid_amt=NEW.lnrp_paid_amount;
SET @new_principal=(@principal-NEW.lnrp_paid_amount);

IF @balance>0 THEN

  WHILE @init_paid_amt>=@sch_unit DO
      UPDATE `loanschedule` SET loanschedule.sch_status=1 WHERE loanschedule.sch_status=0 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
      SET @init_paid_amt = (@init_paid_amt-@sch_unit);
  END WHILE;

  IF @init_paid_amt>0 THEN
      UPDATE `loanschedule` SET loanschedule.sch_status=2 WHERE loanschedule.sch_status=0 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
  END IF;

  UPDATE `loans` SET loans.ln_balance=(@balance-@init_paid_amt),loans.ln_paid=(@loan_paid+@init_paid_amt) WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1;

END IF;

END




BEFORE_LOANSCHEDULE_UPDATE
==================================
BEGIN
   
SET @sch_status=(SELECT sch_status FROM loanschedule WHERE loanschedule.sch_id=NEW.sch_id LIMIT 1);

IF @sch_status!=1
	THEN
    SET @ln_id=(SELECT sch_ln_id FROM loanschedule WHERE loanschedule.sch_id=NEW.sch_id LIMIT 1);
    SET @amount=(SELECT sch_due_amt FROM loanschedule WHERE loanschedule.sch_id=NEW.sch_id LIMIT 1);
    SET @principal=(SELECT ln_principal FROM loans WHERE loans.ln_id=@ln_id LIMIT 1);
    SET @balance=(@principal-@amount);
    INSERT INTO `loanrepayments`(`lnrp_ln_id`, `lnrp_payment_method`, `lnrp_collected_by`, `lnrp_paid_amount`, `lnrp_principal`,`lnrp_balance`) VALUES (@ln_id,'Cash',NEW.sch_paid_by,@amount,@principal,@balance);
    
END IF;

END