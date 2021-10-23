<?php

namespace App\Controllers;

use App\Models\ItemModel;
use Exception;

class Gerencia extends BaseController
{

    public function index()
    {
        echo view('header', ['body' => '']);
        echo view('acoes_admin');
        echo view('footer');
    }

    public function view_insert()
    {
        $data = [];
        $data['msg'] = null;
        $data['titulo'] = "REGISTRAR ITEM";
        $data['acao'] = 'salvar';
        var_dump($this);die;
        $this->load->view('header', ['body' => 'item']);
        $this->load->view('item', $data);
        $this->load->view('footer');
    }

    public function view_update($id_item)
    {
        $data = [];
        $itemModel = new ItemModel();
        $item = $itemModel->find($id_item);
        $data['item'] = $item;
        $data['msg'] = null;
        $data['titulo'] = "REGISTRAR ITEM";
        $data['acao'] = 'alterar';
        echo view('header', ['body' => 'item']);
        echo view('item', $data);
        echo view('footer');
    }

    public function view_get()
    {
        $itemModel = new ItemModel();
        $data['msg'] = null;
        $data['itens'] = $itemModel->find();
        $data['titulo'] = "Itens";
        $data['msg'] = $this->session->getFlashdata('msg');
        echo view('header');
        $this->load->view('itens', $data);
        echo view('footer');
    }

    public function salvar()
    {
        // verificar se ouve um submit do tipo post para fazer o cadastro
        try {
            // criar uma instancia da model para armazenar no banco de dados
            $itemModel = new ItemModel();
            $itemModel->set('nome', $this->request->getPost('nome'));
            $itemModel->set('descricao', $this->request->getPost('descricao'));
            $itemModel->set('preco', $this->request->getPost('preco'));
            $itemModel->set('forca', $this->request->getPost('forca'));
            $itemModel->set('agilidade', $this->request->getPost('agilidade'));
            $itemModel->set('inteligencia', $this->request->getPost('inteligencia'));
            $itemModel->set('vida', $this->request->getPost('vida'));
            $itemModel->set('mana', $this->request->getPost('mana'));
            $itemModel->set('dano', $this->request->getPost('dano'));
            $itemModel->set('armadura', $this->request->getPost('armadura'));
            $itemModel->set('velocidadeDeAtq', $this->request->getPost('velocidadeDeAtq'));
            $file = $this->request->getFile('imagem');
            $nomeImagem = str_replace(' ', '_', strtolower($nome)) . '_' . $file->getName();

            // verfica a validade da imagem
            if (!$file->isValid()) {
                throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
            }
            $file->move("../assets/imgs/", $nomeImagem);
            $itemModel->set('imgaluno', "/imgs/" . $nomeImagem);

            // tenta executar a inserção e retorna para a listagem de listagem de alunos
            // informando a resultado do comando de insercao
            if ($itemModel->insert()) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }
        } catch (Exception $e) {
            return json_encode(false);
        }
    }

    // carregar e preparar a view para a atualização do aluno
//    public function editar($alunoid)
//    {
//
//        //prepara as informações da view de editar
//        $data['titulo'] = "Editar aluno";
//        $data['acao'] = 'Editar';
//        $data['msg'] = '';
//
//        // carrega e prepara o aluno com o ID passado para a atualização
//        $alunoModel = new \App\Models\AlunoModel();
//        $aluno = $alunoModel->find($alunoid);
//
//        if (!isset($aluno)) {
//            return redirect()->to(base_url('/alunos'));
//        } else {
//            $request = \Config\Services::request();
//            $method = $request->getMethod();
//            // verificar se ouve um submit do tipo post para fazer o cadastro
//            if ($method == 'post') {
//                $nome = $request->getPost('nome');
//                $aluno->nome = $nome;
//                $aluno->endereco = $request->getPost('endereco');
//
//                // manipular a imagem e seu nome e para guardar na respectiva pasta
//                $file = $request->getFile('imagem');
//                $nomeImagem = str_replace(' ', '_', strtolower($nome)) . '_' . $file->getName();
//
//                // verfica a validade da imagem
//                //guarda a imagem e atualiza o aluno
//                if ($file->isValid()) {
//                    $file->move("../public/imgs/", $nomeImagem);
//                    $aluno->imgaluno = "/imgs/" . $nomeImagem;
//                }
//                $db = \Config\Database::connect();
//                $builder = $db->table('aluno');
//                $builder->where('alunoid', $alunoid);
//                $aluno = (array)$aluno;
//                if ($builder->update($aluno)) {
//                    return json_encode(true);
//                } else {
//                    return json_encode(false);
//                }
//            }
//
//            $data['aluno'] = $aluno;
//            echo View('alunos_form', $data);
//        }
//    }

    public function deleteItem($id_item = null)
    {
        if (is_null($id_item)) {
            $this->session->setFlashdata('msg', 'Item não encontrado');
            return redirect()->to(base_url('/gerencia'));
        }
        try {
            $itemModel = new ItemModel();
            if ($itemModel->delete($id_item)) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }
        } catch (Exception $e) {
            $this->session->setFlashdata('msg', 'Não foi possível remover o item. Contate o suporte.');
            return redirect()->to(base_url('/gerencia'));
        }
    }
}