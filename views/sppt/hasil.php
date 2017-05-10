<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
//use yii\captcha\Captcha;

$this->title = 'HASIL';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <table border='1'>
                <tr>
                    <td>NOP</td>
                    <td><?php echo($nop) ?></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><?php echo($data['THN_PAJAK_SPPT']) ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?php echo($data['NM_WP_SPPT']) ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo($data['JLN_WP_SPPT']) ?></td>
                </tr>
                <tr>
                    <td>KELURAHAN</td>
                    <td><?php echo($data['KELURAHAN_WP_SPPT']) ?></td>
                </tr>
                <tr>
                    <td>TAGIHAN POKOK</td>
                    <td><?php echo($data['PBB_YG_HARUS_DIBAYAR_SPPT']) ?></td>
                </tr>
                <tr>
                    <td>DENDA</td>
                    <td><?php echo $denda;
                    ?></td>
                </tr>
                <tr>
                    <td>TAGIHAN</td>
                    <td><?php echo $data['PBB_YG_HARUS_DIBAYAR_SPPT']+$denda;
                    ?></td>
                </tr>
                <tr>
                    <td>KETERANGAN</td>
                    <td><?php if($data['STATUS_PEMBAYARAN_SPPT']==1){echo "LUNAS";}else{echo "BELUM LUNAS";};
                    ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
