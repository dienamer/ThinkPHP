<?php
namespace app\api\controller\v1;
use app\api\validate\BannerVaildate;
use app\api\model\Banner as BannerModel;
class Banner
{
    public function getBanner($id)
    {
        (new BannerVaildate())->goCheck();
        $result = BannerModel::getBannerByID($id);
        var_dump($result);
    }
}