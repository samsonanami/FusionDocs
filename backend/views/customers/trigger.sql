BEGIN

SET @interest_rate_per=(SELECT lnp_max_interest FROM loanproducts WHERE loanproducts.lnp_id=NEW.lnp_id LIMIT 1);


SET @INCREMENT = 0 ;
SET @INCREMENT_DATE = 30;
SET @PRINCIPAL=(NEW.ln_principal/NEW.ln_repayment_count);
SET @INTEREST=(@interest_rate_per*@PRINCIPAL)/100;
SET @DUE_AMT=(@PRINCIPAL+@INTEREST);

WHILE @INCREMENT<=NEW.ln_repayment_count DO
	INSERT INTO `loanschedule` (`sch_date`, `sch_principal`, `sch_interest`, `sch_fee`, 
    `sch_due_amt`, `sch_desc`, `sch_ln_id`)
     VALUES(DATE_ADD(NEW.ln_released, INTERVAL @INCREMENT_DATE DAY),@PRINCIPAL,@INTEREST, NEW.ln_fees,@DUE_AMT,'Repayment', NEW.ln_id);
    SET @INCREMENT = @INCREMENT+1;
    SET @INCREMENT_DATE = @INCREMENT_DATE+30;
END WHILE;

END