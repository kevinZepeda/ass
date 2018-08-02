SELECT p.*,m.*,u.`username`,u.`user_id` owner_id,u.`avatar`,(SELECT COUNT(l.`id`) FROM  `{%t_likes%}` l WHERE l.`post_id` = p.`post_id` ) AS likes

	FROM `{%t_posts%}` p INNER JOIN `{%t_media%}` m ON m.`post_id` = p.`post_id` 

	INNER JOIN `{%t_users%}` u ON p.`user_id` = u.`user_id`

	{%if offset%}
		WHERE p.`post_id` < {%offset%}
	{%endif%}

	{%if hashtag_id%}
		AND p.`description` LIKE CONCAT('%#[','{%hashtag_id%}',']%')
	{%endif%}

	{%if user_id%}

		{@ `Exclude posts from blocked users  or vice versa if user is logged in` @}
	 
		AND p.`user_id` NOT IN (SELECT b1.`profile_id` FROM `{%t_blocks%}` b1 WHERE b1.`user_id` = {%user_id%})

		AND p.`user_id` NOT IN (SELECT b2.`user_id` FROM `{%t_blocks%}` b2 WHERE b2.`profile_id` = {%user_id%})

	{%endif%}

	GROUP BY p.`post_id` ORDER BY p.`post_id` DESC LIMIT {%total_limit%}