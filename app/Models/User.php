<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id' , 'username' , 'nama' , 'email' , 'password' , 'status' , 'role' , 'foto'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    public function login($username, $password)
    {
        $user = $this->where('username', $username)
                     ->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false;
    }

    public function cekpassword($id, $password)
    {
        $user = $this->where('id', $id)
                     ->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false;
    }
    public function ubahpassword($passwordbaru)
    {
            $pw = password_hash($passwordbaru , PASSWORD_DEFAULT);
            return $pw;
    }


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
