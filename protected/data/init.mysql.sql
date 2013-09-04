DELETE FROM tbl_account WHERE id_account > 0;
DELETE FROM tbl_payment WHERE id_payment > 0;
DELETE FROM tbl_tariff WHERE id_tariff > 0;

INSERT INTO tbl_tariff VALUES (1, 10, 25, 0.0, 'Free Trial', 'Бесплатное использование в течении месяца');
INSERT INTO tbl_tariff VALUES (2, 15, 100, 15.0, 'Обычный', '450р в месяц');
INSERT INTO tbl_tariff VALUES (3, 50, 1000, 30.0, 'расширенный', '900р в месяц');

INSERT INTO tbl_account VALUES (1, 'root', 'nagornov.oi@gmail.com', MD5('qwerty'), CURRENT_TIMESTAMP, NULL, 'root', 'root', 'qwerty', 0.0, 0);
INSERT INTO tbl_account VALUES (2, 'test', 'test@test.com', MD5('qwerty'), CURRENT_TIMESTAMP, 'a1_test_', 'new', 'user', 'qwerty', 0.0, 1);