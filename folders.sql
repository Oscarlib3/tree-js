CREATE TABLE `folders` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `parentid` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `folders` (`id`, `name`, `parentid`) VALUES
(1, 'Folder1', 0),
(2, 'Folder2', 0),
(3, 'Folder 1 sub1', 1),
(4, 'Folder 1 sub1.1', 3),
(5, 'Folder 1 sub1.2', 3),
(6, 'Folder 1 sub1.1.1', 4),
(7, 'Folder 1 sub2', 1),
(8, 'Folder 1 sub3', 1),
(9, 'Folder 1 sub3.1', 8),
(10, 'Folder 2 sub1', 2),
(11, 'Folder 2 sub1.1', 10),
(12, 'Folder 2 sub1.2', 10),
(13, 'Folder 2 sub2', 2),
(14, 'Folder 3', 0);
