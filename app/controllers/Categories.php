<?php


class Categories extends Controller
{
    public function index($page)
    {
        $products = $this->model('Products');

        $countPosts = 3;
        if ($page === 0) {
            $page = 1;
        }
        $begin = $page * $countPosts - $countPosts;

        $data = [
            'products' => $products->getProductsForPagination($begin, $countPosts),
            'title' => 'Все товары на сайте',
            'total' => ceil(count($products->getProducts()) / $countPosts)
        ];
        $this->view('categories/index', $data);
    }

    public function shoes()
    {
        $products = $this->model('Products');
        $data = [
            'products' => $products->getProductsCategory('shoes'),
            'title' => 'Обувь'

        ];
        $this->view('categories/index', $data);
    }

    public function hats()
    {
        $products = $this->model('Products');
        $data = [
            'products' => $products->getProductsCategory('cap'),
            'title' => 'Кепки'

        ];

        $this->view('categories/index', $data);
    }

    public function tshirt()
    {
        $products = $this->model('Products');
        $data = [
            'products' => $products->getProductsCategory('tshirt'),
            'title' => 'Футболки'

        ];
        $this->view('categories/index', $data);
    }

    public function watches()
    {
        $products = $this->model('Products');
        $data = [
            'products' => $products->getProductsCategory('watches'),
            'title' => 'Часы'

        ];
        $this->view('categories/index', $data);
    }

}