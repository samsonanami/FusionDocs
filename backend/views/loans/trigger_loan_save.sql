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
SET @DUE_INCREMENT=(NEW.ln_repayment_count*30);
SET NEW.ln_maturity=DATE_ADD(NEW.ln_released, INTERVAL 30 DAY);
SET NEW.ln_due = DATE_ADD(NEW.ln_released, INTERVAL @DUE_INCREMENT DAY);
SET NEW.ln_balance=(NEW.ln_principal+@ln_interest);

END