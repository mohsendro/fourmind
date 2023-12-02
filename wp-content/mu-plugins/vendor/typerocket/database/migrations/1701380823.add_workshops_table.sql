-- Description: For advertising table structure

-- >>> Up >>>

CREATE TABLE
    IF NOT EXISTS `fm_workshops` (
        `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `course_id` bigint(20) NOT NULL,
        `full_name` text NOT NULL,
        `job` text NOT NULL,
        `field` text NOT NULL,
        `tel` text NOT NULL,
        `email` text NOT NULL,
        `date` date NOT NULL,
        `textarea1` varchar(255) NOT NULL,
        `textarea2` varchar(255) NOT NULL,
        `textarea3` varchar(255) NOT NULL,
        `textarea4` varchar(255) NOT NULL,
        `textarea5` varchar(255) NOT NULL,
        `textarea6` varchar(255) NOT NULL,
        `textarea7` varchar(255) NOT NULL,
        `textarea8` varchar(255) NOT NULL,
        `textarea9` int(255) NOT NULL,
        `textarea10` varchar(255) NOT NULL,
        `checkList` varchar(255) NOT NULL,
        `price` int(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_520_ci;

-- >>> Down >>>

DROP TABLE IF EXISTS `fm_workshops`;