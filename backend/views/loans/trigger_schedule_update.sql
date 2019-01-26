BEGIN

SET @principal=(SELECT ln_principal FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1);
SET @balance=(SELECT ln_balance FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1);
SET @loan_paid=(SELECT ln_paid FROM loans WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1); 
SET @sch_unit=(SELECT sch_due_amt FROM loanschedule WHERE loanschedule.sch_ln_id=NEW.lnrp_ln_id AND sch_status=0 LIMIT 1);
SET @sch_paid=0;
SET @sch_paid=(SELECT sch_paid_amount FROM loanschedule WHERE loanschedule.sch_ln_id=NEW.lnrp_ln_id AND sch_status=2 LIMIT 1);
SET @init_paid_amt=NEW.lnrp_paid_amount;
SET @new_principal=(@principal-NEW.lnrp_paid_amount);

IF @balance>0 THEN
-- check if partial exist and update
IF @sch_paid!=0 THEN
    SET @sch_unpaid_amt=(@sch_unit-@sch_paid);
-- update partially paid to fully paid
    UPDATE `loanschedule` SET loanschedule.sch_status=1,loanschedule.sch_paid_amount=@sch_unit WHERE loanschedule.sch_status=2 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
    UPDATE `loans` SET loans.ln_balance=(@balance-@sch_unpaid_amt),loans.ln_paid=(@loan_paid+@sch_unpaid_amt) WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1;
    SET @init_paid_amt = (@init_paid_amt-@sch_unpaid_amt);
END IF;

  WHILE @init_paid_amt>=@sch_unit DO
--   update fully paid
      UPDATE `loanschedule` SET loanschedule.sch_status=1,loanschedule.sch_paid_amount=@sch_unit WHERE loanschedule.sch_status=0 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
      UPDATE `loans` SET loans.ln_balance=(@balance-@sch_unit),loans.ln_paid=(@loan_paid+@sch_unit) WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1;
      SET @init_paid_amt = (@init_paid_amt-@sch_unit);
  END WHILE;

  IF @init_paid_amt>0 THEN
--   Update partially paid
    UPDATE `loanschedule` SET loanschedule.sch_status=2,loanschedule.sch_paid_amount=@init_paid_amt WHERE loanschedule.sch_status=0 AND loanschedule.sch_ln_id=NEW.lnrp_ln_id LIMIT 1;
    UPDATE `loans` SET loans.ln_balance=(@balance-@init_paid_amt),loans.ln_paid=(@loan_paid+@init_paid_amt) WHERE loans.ln_id=NEW.lnrp_ln_id LIMIT 1;
    SET @init_paid_amt = 0;
  END IF;
  
END IF;

END