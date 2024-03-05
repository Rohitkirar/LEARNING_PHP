
-- 3) like count comment count on posts;

-- 3.1) total likes
SELECT posts.id , title  ,count(postlikes.id) as Totallikes
FROM posts
JOIN 
    postlikes
ON posts.id = postlikes.post_id
WHERE flag = 1
GROUP BY posts.id;

-- 3.2) total comments

SELECT posts.id , title , count(postcomments.id) as totalcomments
FROM postcomments, posts
WHERE posts.id  = postcomments.post_id
GROUP BY posts.id;
