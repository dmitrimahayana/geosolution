DELIMITER $$
CREATE 
	EVENT `delete_log_history` 
	ON SCHEDULE EVERY 1 DAY STARTS '2014-01-23 1:00:00' 
	DO BEGIN
		CREATE TEMPORARY TABLE tmptable
		SELECT * FROM (
		SELECT `ID_HISTORY`,`ID_USER`,`IP_ADDRESS`,`TIME` ,UNIX_TIMESTAMP(NOW()) AS UNIXNOW, UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 2 DAY)) AS DATEINTERVAL
		FROM `login_history`
		)a
		WHERE `TIME`<DATEINTERVAL;
		
		DELETE lg.* FROM login_history lg
		INNER JOIN tmptable ON tmptable.ID_HISTORY = lg.ID_HISTORY
		WHERE (lg.ID_HISTORY = tmptable.ID_HISTORY);
		
		DROP TABLE tmptable;
END;
$$
DELIMITER ;



		INSERT INTO `login_history`(`ID_USER`, `IP_ADDRESS`, `TIME`, `IS_ONLINE`) VALUES 
		("1","127.0.0.1","1390550576","1");