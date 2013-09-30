<div style="width:90%; background:#EBEBEB; padding:30px; font-family:Arial, Helvetica, sans-serif; margin:0 auto;">
    <a href="<?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl ?>" style="text-align:center; display:block;">

        <?php
        echo CHtml::image(Yii::app()->request->hostInfo . Yii::app()->theme->baseUrl . "/images/obeid_machinery_logo_03.png", '', array('width' => '75', 'height' => '106'))
        ?>
    </a>

    <center>
        <h1 style="text-align:center; font-size:14px; color:#089AD4; 
            color:#089AD4;">30 experience-rich years of rock-solid reputation 
            in the industry of heavy machinery <br />and construction equipment. That’s what Obeid Machinery is about.
        </h1>
    </center>

    <h2><?php echo $email['Subject'] ?></h2>
    <p style="color:#575757; font-size:13px;">
        <?php
        echo $email['Body'];
        ?>
    </p>
    <p style="color:#575757; font-size:13px;">If we can be of any further assistance, please let us know.</p><br />
    <span style="color:#575757; font-size:13px; font-weight:bold;">Obied Machinery</span><br />
    <span style="color:#575757; font-size:13px;">

        <span style="color:#575757; font-size:13px;"> Office
            P.O. Box 89056,
            Malaz, Shara Siteen,

            Riyadh, Saudi Arabia</span><br />
        Tel: + 966-114765659<br />

        Fax: + 966-11476187
    </span><br />
    <span style="color:#575757; font-size:13px; font-weight:bold;">Contact Persons</span><br />
    <span style="color:#575757; font-size:13px;"> Mr Khalid Bhatti: +966-505442998</span><br />
    <span style="color:#575757; font-size:13px;"> Mr Fahad Bhatti: +966-506516724</span><br />



    <span style="color:#575757; font-size:13px;">

        <?php
        echo CHtml::mailto("info@om.com", "info@om.com");
        ?>
    </span>
</div>