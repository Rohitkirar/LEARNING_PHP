
-- 5) user's who have liked or commented on any post/s

SELECT id , fullname
FROM users
JOIN
(
SELECT  user_id FROM postlikes
UNION
SELECT user_id FROM postcomments
) as t1
ON id = t1.user_id;

