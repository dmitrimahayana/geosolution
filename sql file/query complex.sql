/*query menu backend*/
SELECT * FROM `backend_page`
WHERE `ID_PARENT_BACKEND` IS NULL

/*query submenu backend*/
SELECT * FROM (
            SELECT backend_access.ID_BACKEND_PAGE, ID_GROUP, `ID_PARENT_BACKEND`, `NAME_BACKEND`,
                `ORDERING_BACKEND`, `LINK_BACKEND`, `ONLINE_BACKEND`, `DISPLAY_NAME`
            FROM backend_access
            INNER JOIN backend_page
            ON backend_access.ID_BACKEND_PAGE=backend_page.ID_BACKEND_PAGE
            ) query1
        WHERE `ID_GROUP`=1 AND `ONLINE_BACKEND`=1
        ORDER BY ID_PARENT_BACKEND, ORDERING_BACKEND

/*query menu frontend backend*/
SELECT parent_ID, parent_menu, ID_MENU_CATEGORY, `NAME_CATEGORY`,ID_MENU, `NAME_MENU`,ORDERING_MENU, 
`LINK_MENU`, `ONLINE_MENU`, `METADATA`
FROM (
	SELECT query1.`ID_PARENT` AS parent_ID, parent.`NAME_MENU` AS parent_menu, query1.ID_MENU,`NAME_CATEGORY`, 
	query1.`NAME_MENU`,query1.`ORDERING_MENU`, query1.`LINK_MENU`, query1.`ONLINE_MENU`, query1.`METADATA`,query1.ID_MENU_CATEGORY
	FROM (
		SELECT `ID_PARENT`,`ID_MENU`,`menu_category`.`NAME_CATEGORY`, `NAME_MENU`, menu.ID_MENU_CATEGORY, `ORDERING_MENU`, `LINK_MENU`, `ONLINE_MENU`, `METADATA`
		FROM `menu`
		INNER JOIN `menu_category`
		ON menu_category.ID_MENU_CATEGORY=menu.ID_MENU_CATEGORY
	)query1
	LEFT JOIN menu parent
	ON query1.ID_PARENT=parent.ID_MENU
)query2
ORDER BY parent_ID DESC, ID_MENU_CATEGORY DESC, ORDERING_MENU DESC

/*query menu frontend lang*/
SELECT `ID_MENU_LANG`, lang.`ID_LANG`, `ID_MENU`, `TEXT_MENU`, `LANG`
FROM `menu_lang`
INNER JOIN lang
ON lang.`ID_LANG`=`menu_lang`.`ID_LANG`
WHERE `ID_MENU`=10

SELECT `ID_BACKEND_PAGE`, `NAME_BACKEND`
FROM `backend_page`
WHERE `ONLINE_BACKEND`=1 AND `ID_PARENT_BACKEND` IS NOT NULL AND `ID_BACKEND_PAGE` NOT IN
(
	SELECT ba.ID_BACKEND_PAGE
	FROM backend_access ba
	LEFT JOIN backend_page bp
	ON ba.ID_BACKEND_PAGE=bp.ID_BACKEND_PAGE
	WHERE ba.ID_GROUP=1
)