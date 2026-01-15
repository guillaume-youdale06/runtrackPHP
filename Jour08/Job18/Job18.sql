SELECT etage.nom, salles.nom AS 'Biggest Room', salles.capacite
FROM etage
INNER JOIN salles
ON etage.id = salles.id_etage
WHERE salles.capacite = (
    SELECT MAX(capacite)
    FROM salles
);