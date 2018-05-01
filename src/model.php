<?php 
class Country {
    protected $db;
    
    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    // возвращает список стран
    public function all() {
        $query = 'SELECT * FROM country';
        $query = $this->db->prepare($query);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // добавляет новую страну в базу данных
    // вызывает исключение если название не подходит
    public function add($newName) {
        // вычистим HTML тэги из названия если они там есть
        $newName = strip_tags($newName);
        if (empty($newName)) {
            throw new ErrorException('Пустая или состоящая из тэгов строка');
        }
        $query = "INSERT INTO country (name) VALUES(:name)";
        $query = $this->db->prepare($query);
        $query->bindValue('name', $newName);
        if (!$query->execute()) {
            throw new ErrorException('Не удалось добавить');
        }
    }
}