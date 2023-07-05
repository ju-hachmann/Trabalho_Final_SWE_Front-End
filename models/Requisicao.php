<?php

namespace Models;

/** 
 * Cria e executa as requisições de acordo com os parâmetros e endpoints definidos na API
 */
class Requisicao 
{

    /**
     * Servidor e porta do serviço web
     */
    public const DOMINIO = 'http://localhost:8081';


    /**
     * Endpoints conforme definidos no Controller na API
     * 
     * Definidos aqui como constantes apenas para clareza e organização
     * Qualquer mudança nos endpoints das APIs, precisam ser refletidas aqui e nas requisições
     */
    public const GET_ALL = '/get_all';
    public const GET_TODOS_CONTENDO = '/get_todos_contendo';
    public const GET_POR_AUTOR = '/get_por_autor';
    public const GET_POR_TITULO = '/get_por_titulo';
    public const GET_POR_ISBN = '/get_por_isbn';
    public const ADICIONAR_LIVRO = '/adicionar_livro';
    public const DELETE_ALL = '/delete_all';
    public const DELETE_POR_ID = '/delete_por_id';
    public const REAJUSTAR_PRECO = '/reajustar_preco';
    /** Esta usa PathVariable */
    public const REAJUSTAR_POR_ID = '/reajustar_preco_por_id'; 



    /**
     * Retorna um endpoint para uma busca a partir de um filtro
     * 
     * @param string $filtro_de_busca
     * @return string Retorna o endpoint da busca
     */
    public function get_endpoint($filtro_de_busca) 
    {
        switch($filtro_de_busca)
        {
            case 'todos':
                return Requisicao::GET_TODOS_CONTENDO;
            case 'autor':
                return Requisicao::GET_POR_AUTOR;
            case 'titulo': 
                return Requisicao::GET_POR_TITULO;
            case 'isbn':
                return Requisicao::GET_POR_ISBN;
            default:
                return null;
        }
    }


    /**
     * Executa a requisição de buscar todo os livros
     * 
     * Requisição get simples a uma api
     * Utiliza o método file_get_contents($endpoint_da_api)
     * Pode ser usada com qualquer requisição get, inclusive com PathVariables, desde que não envie dados
     * @return Retorna a resposta da API
     */
    public function busca_geral()
    {
        $url = Requisicao::DOMINIO . Requisicao::GET_ALL;
        $result = file_get_contents($url);
        return $result;
    }


    /**
     * Executa a requisição de busca de acordo com um filtro
     * 
     * Para requisições que precisam enviar dados ou não sejam GET
     * Utiliza a biblioteca 'cURL'
     * 
     * Para não se desesperar com todas as configurações, usar as ferramentas abaixo:
     * a) Gerar cURLs a partir dos endpoints: https://curlbuilder.com/ 
     * b) Setar a requisição via php: https://codebeautify.org/curl-to-php-online  
     *  
     * @param string $filtro Filtro de busca a ser utilizado
     * @param string $termo Termo para ser buscado
     * @return Retorna a resposta da API
     */
    public function busca_com_filtro ($filtro, $termo)
    {
        $endpoint = $this->get_endpoint($filtro);
        $url = Requisicao::DOMINIO . $endpoint;

        // Generated @ codebeautify.org
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $termo);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;

    }



    /**
     * Executa a requisicão para criar um novo livro
     * 
     * @param Livro $livro 
     * @return Retorna a resposta da API
     */
    public function adicionar_livro($livro) 
    {
        $url = Requisicao::DOMINIO . Requisicao::ADICIONAR_LIVRO;

        /** json_encode() transforma um objeto php em uma string json */
        $livro_json = json_encode($livro);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $livro_json);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }


    /**
     * Executa a requisição para deletar por id
     * 
     * @param int $id
     * @return Retorna a resposta da API
     */
    public function deletar_por_id($id) 
    {
        $url = Requisicao::DOMINIO . Requisicao::DELETE_POR_ID;
       
        // Generated @ codebeautify.org
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $id);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }


    /**
     * Executa a requisição para deletar todos os livros
     * 
     * @return Retorna a resposta da API
     */
    public function deletar_todos() 
    {
        $url = Requisicao::DOMINIO . Requisicao::DELETE_ALL;

        // Generated @ codebeautify.org
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }


    /**
     * Executa a requisição para reajustar o preço de um livro dado seu id e a taxa de reajuste
     * 
     * @param int $id
     * @param int $taxa
     * @return Retorna a resposta da API
     */
    public function reajustar_por_id($id, $taxa) 
    {
        $url = Requisicao::DOMINIO . Requisicao::REAJUSTAR_POR_ID . '/' . $id . '/' . $taxa;
        
        // Generated @ codebeautify.org
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }


    /**
     * Executa a requisição para reajustar o preço de todos os livros dada uma taxa de reajuste
     * 
     * @param int $taxa
     * @return Retorna a resposta da API
     */
    public function reajustar_todos($taxa) 
    {
        $url = Requisicao::DOMINIO . Requisicao::REAJUSTAR_PRECO;

        // Generated @ codebeautify.org
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $taxa);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

              
}
