<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id_item';
    protected $allowedFields = ['id_item',
        'nome',
        'descricao',
        'preco',
        'forca',
        'agilidade',
        'inteligencia',
        'vida',
        'mana',
        'dano',
        'armadura',
        'velocidadeDeAtq',
        'habilidadeAtiva',
        'descricaoAtiva',
        'habilidadePassiva',
        'descricaoPassiva',
        'imagem'];
    protected $returnType = 'object';
}

