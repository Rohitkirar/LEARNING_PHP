-- 8) 8. top 10 daily screen time users on specific day wise


SELECT
    users.id ,
    fullName ,
    DAY(to_time) as days,
    SUM(ABS(TIMESTAMPDIFF(SECOND ,to_time , from_time))) as seconds 
FROM tracking 
JOIN
    users 
ON
    tracking.user_id = users.id
GROUP BY days , users.id
HAVING days = 4
ORDER BY  seconds DESC
LIMIT 10;