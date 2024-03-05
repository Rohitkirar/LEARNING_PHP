
-- 4) user's who have liked on any post's

SELECT users.id , fullName , count(postlikes.id) as totallikes
FROM users , postlikes
WHERE users.id = postlikes.user_id
GROUP BY users.id; 
