
-- 6) user's active duration daily using IDENTIFIED

SELECT * FROM tracking;

SELECT
    users.id ,
    fullName ,
    SUM(ABS(TIMESTAMPDIFF(SECOND ,to_time , from_time))) as seconds 
FROM tracking , users 
WHERE tracking.user_id = users.id
GROUP BY users.id
ORDER BY  seconds DESC;

-- 2nd way
SELECT
    users.id ,
    fullName,
    ROUND(seconds/3600) as hours,
    ROUND(seconds/60) as minutes,
    ROUND(seconds%60) as seconds 
FROM 
users
JOIN 
(
SELECT 
    user_id , 
    SUM(ABS(TIMESTAMPDIFF(SECOND ,to_time , from_time))) as seconds FROM tracking
GROUP BY 
    user_id
) as secondtable
ON secondtable.user_id = users.id
ORDER BY 
    hours DESC ,
    minutes DESC,
    seconds DESC;









