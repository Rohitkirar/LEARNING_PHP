
-- 2) user's details with total post counts

SELECT users.id , fullname , gender , email , mobile , count(posts.id) as totalPosts
FROM users
JOIN 
posts
On users.id = posts.user_id
GROUP BY users.id;
