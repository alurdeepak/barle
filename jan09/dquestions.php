<?php
$GET_REG_COUNT="select * from dat_attendees";
$ADD_REGS="insert into dat_regs(fname,lname,email,mobile,pwd,reg_on,remote_ip,address,pincode,nativeplace,college,yop,intro,expect,contribute) values('";

$GET_USER_BY_LOGIN='select * from dat_regs where email=';
$GET_MY_FAMILY_DETS='select t1.id as mid, t2.id as pid, t1.afname, t1.alname, t1.age,t1.gender, t1.created_on, t1.parent_id_fk,t2.fname,t2.lname, t2.email, t2.mobile, t2.reg_on,t1.price from dat_attendees t1,dat_regs t2 where t2.id=t1.parent_id_fk';
$ADD_ATTENDEE='insert into dat_attendees(afname,alname,age,gender,created_on,parent_id_fk,mobile,email,price) values(';
$DEL_MEMBER="delete from dat_attendees where id=";
$GET_USER_BY_ID='select * from dat_regs where id=';
$GET_ALL_ATTENDEES='select * from dat_attendees';
$GET_PRICES='select * from mas_prices';
$ADD_PMT='insert into dat_payments(attendee_id_fk,payment_id,payment_request_id,paid_on,status) values(';
$UPDATE_PAYMENT='update dat_payments set amt=';
$GET_PAYMENT_FOR_USER='select * from dat_payments where attendee_id_fk=';
$ADD_PAYMENT_ATTENDEES='insert into lkp_payments_attendees (attendee_id_fk,payment_id_fk,remote_ip) values(';
$GET_PAYMENT_FOR_FAMILY='SELECT t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk AND t1.attendee_id_fk=';

$GET_PAYMENTS_TO_BE_MADE='SELECT * FROM dat_attendees t1 WHERE id NOT IN (SELECT attendee_id_fk FROM lkp_payments_attendees WHERE payment_id_fk IN (SELECT id FROM dat_payments WHERE attendee_id_fk=';

$GET_ALL_PAID_ATTENDEES="SELECT t3.id,t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on,t3.mobile,t3.email,t3.gender FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk and t1.status='Credit' order by t3.parent_id_fk, t3.id";

$GET_REG_BUT_NOT_PAID_USERS="select * from dat_attendees where id not in (select attendee_id_fk from lkp_payments_attendees)";
$UPDATE_NEW_PWD="update dat_regs set pwd='";

$GET_PARENT_ID="SELECT * FROM dat_regs WHERE id=(SELECT parent_id_fk FROM dat_attendees WHERE id=";

$GET_BUDGETS="select * from dat_budgets";

$GET_SURVEY_QS="SELECT t1.id, t1.question FROM mas_survey_qs t1";
$GET_SURVEY_OPTIONS="select * from mas_survey_options where question_id_fk=";

$ADD_ONSITE_ATTENDEE='insert into dat_onsite_attendees(afname,alname,age,gender,created_on,parent_id_fk,mobile,email,price) values(';
$GET_ONSITE_ATTENDEES="SELECT t1.afname,t1.alname,t1.age,t1.gender,t1.created_on,t1.mobile,t1.email,t1.price, t2.fname AS regUser FROM dat_onsite_attendees t1, dat_regs t2 WHERE t1.parent_id_fk=t2.id order by t2.id";

?>