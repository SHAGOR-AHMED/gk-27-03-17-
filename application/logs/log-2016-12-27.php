<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-12-27 06:21:06 --> Severity: Notice --> Undefined variable: regBranchList D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheet.php 32
ERROR - 2016-12-27 06:21:06 --> Severity: Warning --> Invalid argument supplied for foreach() D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheet.php 32
ERROR - 2016-12-27 06:21:08 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\controllers\Accounts.php 291
ERROR - 2016-12-27 06:21:08 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 06:21:08 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 06:26:35 --> Severity: Notice --> Undefined variable: regBranchList D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheet.php 32
ERROR - 2016-12-27 06:26:35 --> Severity: Warning --> Invalid argument supplied for foreach() D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheet.php 32
ERROR - 2016-12-27 06:30:42 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\controllers\Accounts.php 292
ERROR - 2016-12-27 06:30:42 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 06:30:42 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 06:34:44 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\controllers\User.php 35
ERROR - 2016-12-27 07:13:16 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819196
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:17 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819197
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:18 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819198
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:19 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819199
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:19 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819199
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:20 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819200
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:21 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819201
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:23 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:13:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:13:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819203
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:20 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819320
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:21 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819321
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:22 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819322
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:23 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819323
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819324
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819324
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819324
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819324
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819324
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:25 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819325
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:25 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:15:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:15:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819325
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:19:08 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:19:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:19:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819548
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:20:48 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:20:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:20:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819648
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:20:50 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\system\database\DB_query_builder.php 815
ERROR - 2016-12-27 07:20:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `a' at line 8 - Invalid query: SELECT `acc_tran_heads`.`name` as `tran_head_name`, `acc_sub_heads`.`name` as `sub_head_name`, `acc_heads`.`name` as `head_name`, `acc_sub_heads`.`head_id`, `acc_voucher_details`.`sub_head`, `acc_voucher_details`.`tran_head`, sum(acc_voucher_details.debit - acc_voucher_details.credit) as debit_balance, sum(acc_voucher_details.credit - acc_voucher_details.debit) as credit_balance
FROM `acc_voucher_details`
LEFT JOIN `acc_tran_heads` ON `acc_tran_heads`.`id` = `acc_voucher_details`.`tran_head`
LEFT JOIN `acc_sub_heads` ON `acc_sub_heads`.`id` = `acc_voucher_details`.`sub_head`
LEFT JOIN `acc_heads` ON `acc_heads`.`id` = `acc_sub_heads`.`head_id`
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
GROUP BY `acc_voucher_details`.`tran_head`
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:20:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`na' at line 4 - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1482819650
WHERE `acc_heads`.`id` = 1
AND `voucher_date` <= '2016-12-27'
AND branch_id IN()
AND `id` = '672218eb68aee9d6d0ffe6df0c57613178523194'
ORDER BY `acc_heads`.`name` asc, `acc_sub_heads`.`name` asc
ERROR - 2016-12-27 07:22:31 --> Severity: 4096 --> Object of class stdClass could not be converted to string D:\ShorifulWork\htdocs\gkms\application\controllers\Accounts.php 361
ERROR - 2016-12-27 07:23:02 --> Severity: Notice --> Undefined variable: regBranchInfo D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 07:23:02 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 07:23:02 --> Severity: Notice --> Undefined variable: branchInfo D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 07:23:02 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetView.php 13
ERROR - 2016-12-27 10:23:10 --> Severity: Notice --> Undefined variable: regBranchInfo D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetPrint.php 18
ERROR - 2016-12-27 10:23:10 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetPrint.php 18
ERROR - 2016-12-27 10:23:10 --> Severity: Notice --> Trying to get property of non-object D:\ShorifulWork\htdocs\gkms\application\views\Reports\Accounts\BalanceSheetPrint.php 18
ERROR - 2016-12-27 10:40:04 --> 404 Page Not Found: Non_pksf_balance_sheet_report/index
ERROR - 2016-12-27 10:40:06 --> 404 Page Not Found: Non_pksf_balance_sheet_report/index
