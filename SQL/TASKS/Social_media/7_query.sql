-- 7 ) all over top 10 daily screen time users

-- days wise
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
ORDER BY  seconds DESC
LIMIT 10;

-- months wise
SELECT
    users.id ,
    fullName ,
    MONTH(to_time) as months,
    SUM(ABS(TIMESTAMPDIFF(SECOND ,to_time , from_time))) as seconds 
FROM tracking , users 
WHERE tracking.user_id = users.id
GROUP BY months , users.id
ORDER BY  seconds DESC
LIMIT 10;

-- years wise

SELECT
    users.id ,
    fullName ,
    YEAR(to_time) as years,
    SUM(ABS(TIMESTAMPDIFF(SECOND ,to_time , from_time))) as seconds 
FROM tracking , users 
WHERE tracking.user_id = users.id
GROUP BY years , users.id
ORDER BY  seconds DESC
LIMIT 10;