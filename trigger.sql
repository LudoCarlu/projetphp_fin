DROP TRIGGER IF EXISTS after_insert_note ;
DELIMITER $$

CREATE TRIGGER after_insert_note
AFTER INSERT ON note
FOR EACH ROW 

BEGIN
DECLARE moyenne FLOAT ;

SET moyenne = (SELECT AVG(note) from note WHERE note.idAl=NEW.idAl);

UPDATE album SET note = moyenne WHERE idAl = NEW.idAL;

END $$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_note ;
DELIMITER $$
CREATE TRIGGER after_update_note
AFTER UPDATE ON note
FOR EACH ROW 

BEGIN
DECLARE moyenne FLOAT ;

SET moyenne = (SELECT AVG(note) from note WHERE note.idAl=NEW.idAl);

UPDATE album SET note = moyenne WHERE idAl = NEW.idAL;

END $$
DELIMITER ;