<?php
/**
 * class Gallery
 */
class Gallery
{
    /**
     * Возвращает Список Gallery
    **/

    public static function index() 
    {
        $stmt = Connection::query("SELECT * FROM gallery ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Gallery');
    }

    public static function store($opts)
    {
        $sql = "INSERT INTO gallery (name) VALUES (?)";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(1, $opts[0]);
        $stmt->execute();
    }

    public static function update($id, $options)
    {
        $sql = "UPDATE gallery
                SET name = :name
                WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    /* Выбор gallery по id  */
    public static function getById($id)
    {
        $stmt = Connection::prepare("SELECT * FROM gallery  WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_BOTH);
    }
    public static function destroy($id)
    {
        $sql = "DELETE FROM gallery WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
