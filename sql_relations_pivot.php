<?php
//Ako vytvoriť tabuľku so spojeným primárnym kľúčom, tzv. Composite Primary Keys:

mysqli_query($conn, "CREATE TABLE `posts_tags` (
  `post_id` int(11) unsigned NOT NULL DEFAULT '0',
  `tag_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

//Ktorý je šikovný pri PIVOT tabuľkách, ktoré potrebujeme pri M:N reláciách. Pretože kým napríklad jeden príspevok môže mať N komentárov a každý z nich naprí jednému príspevku (vzťah 1:N), taký tag môže patriť viacerými príspevkom a každý príspevok môže mať viacero tagov (vzťah M:N). Takže v tabuľke tags nestačí vytvoriť stĺpec post_id, pretože tých môže byť viac. Preto vytvoríme samostatnú tabuľku.

//Ak chceme upraviť tabuľku, zrušiť primárny kľúč a nastaviť nový:

mysqli_query($conn, 'ALTER TABLE posts_tags DROP PRIMARY KEY, ADD PRIMARY KEY (tag_id, post_id)');


//Ako vytiahnuť všetky tagy patriace konkrétnemu príspevku:

mysqli_query($conn, 'SELECT t.tag FROM posts p
JOIN posts_tags pt ON (p.id = pt.post_id)
JOIN tags t ON (t.id = pt.tag_id)
WHERE p.id = 1');


//Ako vytiahnuť všetky informácie o príspevku, ale v jednej jedinej query k výsledku pridať tiež všetky tagy, pomocou funkcie GROUP_CONCAT, ktoré vie zgrupené hodnoty spojiť do jedného stringu:

mysqli_query($conn, 'SELECT p.*, GROUP_CONCAT(t.tag SEPARATOR '~||~') AS tags
FROM posts p
JOIN posts_tags pt ON (p.id = pt.post_id)
JOIN tags t ON (t.id = pt.tag_id)
WHERE p.id = 1
GROUP BY p.id');


//MySQL CHEAT SHEET, check it:  http://www.cheatography.com/guslong/cheat-sheets/essential-mysql/

?>