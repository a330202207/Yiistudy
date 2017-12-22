<?php

namespace backend\model;

use Yii;
use common\models\BaseActiveRecord;
use common\helpers\FuncHelper;

/**
 * This is the model class for table "menu".
 *
 * @property integer $menu_id
 * @property string $menu_name
 * @property integer $parent
 * @property string $route
 * @property integer $order
 * @property string $data
 */
class Menu extends BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * 配置model规则
     */
    public function rules()
    {
        return [
            [['menu_name'], 'required'],
            [['parent_id', 'sort', 'is_show', 'status'], 'integer'],
            [['menu_name', 'icon', 'action'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => '菜单ID',
            'parent_id' => '父级ID',
            'menu_name' => '菜单名称',
            'sort' => '排序',
            'action' => '菜单路由',
            'icon' => '菜单图标',
            'is_show' => '是否隐藏',
            'status' => '状态',
        ];
    }



    /**
     * 获取菜单列表
     * @inheritdoc
     */
    public function getMenuList($parentId = 0, $type = 1)
    {
        $menu = $this->find()->where(['status' => self::STATUS_ACTIVE])->orderBy('sort ASC')->asArray()->all();
        $menu = FuncHelper::list_to_tree($menu, 'menu_id', 'parent_id', $parentId, $type);
        return $menu;
    }

    //获取左侧菜单列表
    public function getLeftMenuList()
    {
        $uid = Yii::$app->user->identity->getId();
        $auth = Yii::$app->authManager;
        $Roles = $auth->getRolesByUser($uid);


        foreach ($Roles as $vo) {
            $name = $vo->name;
        }
        $Permission = $auth->getPermissionsByRole($name);
        $RolesList = '';
        foreach ($Permission as $vo) {
            $RolesList .= "'" . $vo->name . "',";
        }
        $RolesList = substr($RolesList, 0, -1);

        $menu = Yii::$app->db->createCommand("SELECT * FROM `test_menu` WHERE route IN ($RolesList)  ORDER BY `order` ASC")->queryAll();
        $menu = self::list_to_tree2($menu, 'id', 'parent');
        return $menu;
    }

    //通过id找到router
    public function getRouteById($id)
    {
        $router = Yii::$app->db->createCommand("SELECT * FROM `test_menu` WHERE id='$id'")->queryOne();
        return $router['route'];
    }

}
