<?php

namespace App\models;

class TravelManager extends Model
{
    public function getTravels()
    {
        $stmt = 'SELECT * FROM tp_travels JOIN tp_category ON tp_travels.id_category = tp_category.id_category';
        $stmt = $this->getDb()->prepare($stmt);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Travel::class);

        return $stmt->fetchAll();
    }

    public function getTravel($id)
    {
        $stmt = 'SELECT * FROM tp_travels JOIN tp_category ON tp_travels.id_category = tp_category.id_category WHERE id = :id';
        $stmt = $this->getDb()->prepare($stmt);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Travel::class);

        return $stmt->fetch();
    }

    public function getTravelsByCategory($id_category)
    {
        $stmt = 'SELECT * FROM tp_travels WHERE id_category = :id_category';
        $stmt = $this->getDb()->prepare($stmt);
        $stmt->execute(['id_category' => $id_category]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Travel::class);

        return $stmt->fetchAll();
    }

    public function update(Travel $travel)
    {
        $stmt = $this->getDb()->prepare("UPDATE tp_travels SET name = ?, description = ?, image = ?, price = ?, id_category = ? WHERE id = ?");
        $stmt->execute([
            $travel->getName(),
            $travel->getDescription(),
            $travel->getImage(),
            $travel->getPrice(),
            $travel->getIdCategory(),
            $travel->getId()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->getDb()->prepare("DELETE FROM tp_travels WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function addTravel()
    {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $travel = new Travel();
            $travel->setName($_POST['name']);
            $travel->setDescription($_POST['description']);
            $travel->setPrice($_POST['price']);
            $travel->setIdCategory($_POST['id_category']);

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = $travel->getName() . time() . '.' . $fileExtension;
                $uploadFileDir = '../public/img/';
                $dest_path = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $travel->setImage($newFileName);
                }
            }

            $this->travelManager->add($travel);
            header('Location: /admin');
        }
        require VIEWS . 'content/addTravel.php';
    }

    public function getCategories()
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM tp_category");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCategory($id)
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM tp_category WHERE id_category = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addCategory($name)
    {
        $stmt = $this->getDb()->prepare("INSERT INTO tp_category (name_category) VALUES (?)");
        $stmt->execute([$name]);
    }

    public function updateCategory($id, $name)
    {
        $stmt = $this->getDb()->prepare("UPDATE tp_category SET name_category = ? WHERE id_category = ?");
        $stmt->execute([$name, $id]);
    }

    public function deleteCategory($id)
    {
        $stmt = $this->getDb()->prepare("DELETE FROM tp_category WHERE id_category = ?");
        $stmt->execute([$id]);
    }

    public function add(Travel $travel)
    {
        $stmt = $this->getDb()->prepare("INSERT INTO tp_travels (name, description, image, price, id_category) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $travel->getName(),
            $travel->getDescription(),
            $travel->getImage(),
            $travel->getPrice(),
            $travel->getIdCategory()
        ]);
        $travel->setId($this->getDb()->lastInsertId());
    }


}