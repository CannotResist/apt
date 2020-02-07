<?php

class OperationSystem
{
    const OS_TYPE_NIX     = 1;
    const OS_TYPE_WINDOWS = 2;
    const OS_TYPE_IBMI    = 3;
    const OS_TYPE_MAC     = 4;

    /**
     * build => marketing name
     */
    private static $windowsOsTable = array(528 => 'Windows NT',
        807 => 'Windows NT',
        1057 => 'Windows NT',
        1381 => 'Windows NT',
        2195 => 'Windows 2000',
        2600 => 'Windows XP',
        3790 => 'Windows XP or Windows Server 2003',
        6000 => 'Windows Vista',
        6001 => 'Windows Vista or Windows Server 2008',
        6002 => 'Windows Vista or Windows Server 2008');

    /**
     * @return boolean
     */
    static public function isIIS()
    {
        //return true;
        $webserver = $_SERVER['SERVER_SOFTWARE'];
        return stripos($webserver, 'iis') !== false;
    }

    /**
     * @return integer
     */
    public static function getOsType()
    {
        if (DIRECTORY_SEPARATOR == '\\') {
            return self::OS_TYPE_WINDOWS;
        } else {
            if (in_array(PHP_OS, array('AIX', 'OS400'))) {
                return self::OS_TYPE_IBMI;
            } elseif (PHP_OS == 'Darwin') {
                return self::OS_TYPE_MAC;
            } else {
                return self::OS_TYPE_NIX;
            }
        }
    }

    /**
     * @return integer
     */
    public static function getOsName()
    {
        $osType = self::getOsType();
        switch ($osType) {
            case self::OS_TYPE_WINDOWS:
                return self::getWindowsOsName();
                break;
            case self::OS_TYPE_IBMI:
                return 'Ibmi';
                break;
            case self::OS_TYPE_MAC:
                return 'Mac';
                break;
            case self::OS_TYPE_NIX:
                return 'Linux';
                break;
        }
    }

    /**
     * @return string
     */
    public static function getPhpIniFileLocation()
    {
        return trim(getCfgVar('cfg_file_path'));
    }

    public static function getDefaultListenPort()
    {
        $osType = self::getOsType();
        switch ($osType) {
            case self::OS_TYPE_IBMI:
            case self::OS_TYPE_MAC:
                return 10088;

            case self::OS_TYPE_NIX:
            case self::OS_TYPE_WINDOWS:
            default:
                return 80;
        }
    }

    /**
     * @return string
     */
    private static function getWindowsOsName()
    {
        list(, $build) = explode(" ", php_uname('v'));
        if (array_key_exists($build, self::$windowsOsTable)) {
            return self::$windowsOsTable[$build];
        }
        return 'Windows';
    }

    public static function isIbmi()
    {
        return self::getOsType() == self::OS_TYPE_IBMI;
    }

    public static function isWindows()
    {
        return self::getOsType() == self::OS_TYPE_WINDOWS;
    }

    public static function isLinux()
    {
        return self::getOsType() == self::OS_TYPE_NIX;
    }

    public static function isMac()
    {
        return self::getOsType() == self::OS_TYPE_MAC;
    }
}
function getRealHost(){
   list($realHost)=explode(':',$_SERVER['HTTP_HOST'] ?? 'localhost');
   return $realHost;
}
$host =  getRealHost();
?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Zend Server Test Page</title>
        <style type="text/css" media="screen">
            .zendserver-link{
                color:white;
            }
            body {
                margin: 0px;
                margin-right: 50px;
                margin-left: 50px;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                font-color: #d8e6ec;
                line-height: 2em;
                background: #d8e6ec;
            }

            .p1_congrats {
                font-family: arial;
                color: #074f6d;
                FONT-WEIGHT: bold;
                text-align: center;
                font-size: 34px;
                margin-top: 30px;
                margin-bottom: 10px;
                text-align: center;
            }

            .p1 {
                font-family: arial;
                color: #074f6d;
                text-align: center;
                font-size: 34px;
                margin-top: 20px;
                margin-bottom: 0px;
            }

            .p2 {
                font-family: arial;
                color: #ffffff;
                text-align: center;
                font-size: 17px;
            }

            .urls {
                font-family: arial;
                color: #FFFFFF;
                text-align: left;
                font-size: 14px;
                margin-top: 0px;
                margin-bottom: 0px;
            }

            .p3 {
                font-family: arial;
                color: #074f6d;
                text-align: center;
                font-size: 18px;
                margin-top: 10px;
                margin-bottom: 15px;
            }

            .p4 {
                font-family: arial;
                color: #FFFFFF;
                margin-left: 250px;
                font-size: 21px;
                margin-top: 10px;
                margin-bottom: 25px;
            }

            .moreinfo1 {
                font-family: arial;
                color: #FFFFFF;
                text-align: center;
                font-size: 14px;
                margin-top: 0px;
                margin-bottom: 0px;
            }

            .moreinfo2 {
                font-family: arial;
                color: #FFFFFF;
                text-align: center;
                font-size: 14px;
                margin-top: 0px;
                margin-bottom: 5px;
            }

            .os {
                font-family: arial;
                color: #F99928;
                text-align: right;
                font-size: 14px;
                font-weight: bold;
                margin: 0em;
            }

            .orange {
                font-family: arial;
                color: #03bbff;
                text-align: center;
                font-size: 24px;
                margin-top: 7px;
                margin-bottom: 10px;
                margin-bottom: 20px;
            }

            .link {
                font-family: arial;
                font-size: 12px;
                color: #03bbff;
                text-decoration: none;
            }

            .moreinfolink {
                font-family: arial;
                font-size: 14px;
                color: #03bbff;
                text-decoration: none;
            }

            .imagenotes {
                font-family: arial;
                font-size: 12px;
                font-weight: bold;
                color: #F99928;
                margin-left: 5px;
                margin-bottom: 5px;
                text-decoration: none;
                color: #F99928;
                text-align:center;
            }

            #section1 {
                width: 900px;
                /*height: 450px;*/
                margin-top: 0px;
                margin-right: auto;
                margin-left: auto;
                padding: 12px;
                border-radius: 4px;
                background: #074f6d; /* Old browsers */
                background: -moz-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #074f6d),
                    color-stop(100%, #054d6b)); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* Opera 11.10+ */
                background: -ms-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* IE10+ */
                background: linear-gradient(to bottom, #074f6d 0%, #054d6b 100%);
                /* W3C */
                box-shadow: 0px 0px 10px 2px rgb(114, 114, 114);
            }

            #section2 {
                width: 900px;
                height: 240px;
                margin-top: 20px;
                margin-right: auto;
                margin-left: auto;
                padding: 12px;
                border-radius: 4px;
                background: #074f6d; /* Old browsers */
                background: -moz-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #074f6d),
                    color-stop(100%, #054d6b)); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* Opera 11.10+ */
                background: -ms-linear-gradient(top, #074f6d 0%, #054d6b 100%);
                /* IE10+ */
                background: linear-gradient(to bottom, #074f6d 0%, #054d6b 100%);
                /* W3C */
                box-shadow: 0px 0px 10px 2px rgb(114, 114, 114);
            }

            #steps-table tr td {
                vertical-align: top;
                width: 350px;
                font-family: arial;
                color: #FFFFFF;
            }

            #zend-logo {
                margin-right: auto;
                margin-left: auto;
            }

            #rights {
                margin-right: auto;
                margin-left: auto;
            }

            #blueline {
                margin-top: 15px;
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>
            <!--<p class=p1_congrats>Congrats!</p>-->
        <p class=p1><b>Congrats!</b> Zend Server is now up and running</p>
        <p class=p3>Once content is added to your server, this message will
            no longer be displayed</p>
        <div id="section1">
            <p class=orange>To configure and control
                your Zend Server installation, access the user interface:</p>
            <img src="http://static.zend.com/topics/no1.png"
                 style="margin-left: 200px; margin-top: 0px; float: left;"></img>
            <p class=p4
               style="postion: absolute; margin-bottom: 15px; margin-top: 0px">Open
                your Web browser at:</p>
            <div>
                <table id="steps-table" style="margin-left: 250px;margin-top: 0px;float: left;margin-bottom:  10px;">
                    <tbody>
                        <?php if (OperationSystem::isWindows()) { ?>
                            <tr>
                                <!--<td style="padding-right: 20px;"><p class="os">Windows</p></td>-->
                                <td><p class="urls">
                                        <a target="_blank" class="zendserver-link" href="http://<?php echo $host ?>:10081/ZendServer">http://<?php echo $host ?>:10081/ZendServer</a>
                                        </br>
                                         <?php if (!OperationSystem::isIIS()) { ?>
                                        <a target="_blank" class="zendserver-link"  href="https://<?php echo $host ?>:10082/ZendServer">https://<?php echo $host ?>:10082/ZendServer</a>
                                       </p>
                                         <?php } ?>
                                </td>
                            </tr>
                        <?php } elseif (OperationSystem::isLinux() || OperationSystem::isMac()) { ?>
                            <tr>
<!--                                <td style="padding-right: 20px;"><p class="os">Linux /
                                        Mac OS X</p></td>-->
                                <td>
                                    <p class="urls">
                                        <a target="_blank" class="zendserver-link"  href="http://<?php echo $host ?>:10081/ZendServer">http://<?php echo $host ?>:10081/ZendServer</a></br>
                                        <a target="_blank" class="zendserver-link"  href="http://<?php echo $host ?>:10082/ZendServer">https://<?php echo $host ?>:10082/ZendServer</a>
                                    </p>
                                </td>
                            </tr>
                        <?php } elseif (OperationSystem::isIbmi()) { ?>
                            <tr>
                                <!--<td style="padding-right: 20px;"><p class="os">IBM i</p></td>-->
                                <td><p class="urls">
                                        <a target="_blank" class="zendserver-link"  href="http://<?php echo $host ?>:10081/ZendServer">http://<?php echo $host ?>:10081/ZendServer</a> </br>
                                        <a target="_blank" class="zendserver-link"  href="https://<?php echo $host ?>:10082/ZendServer">https://<?php echo $host ?>:10082/ZendServer</a>
                                    </p>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div align="center" id="blueline">
                <img src="http://static.zend.com/topics/divider-blue-line.png"
                     style="margin-bottom: 1em;width:550px;"></img>
            </div>
            <img src="http://static.zend.com/topics/no2.png"
                 style="margin-left: 200px; margin-top: 0px; float: left;"></img>
            <p class=p4>
                If Zend Server has not been launched yet,</br>complete the launch wizard <a
                    href="http://files.zend.com/help/Zend-Server/zend-server.htm#launching_zend_server.htm"
                    class=link>More info</a>
            </p>
            <div align="center" id="blueline">
                <img src="http://static.zend.com/topics/divider-blue-line.png"
                     style="margin-bottom: 1em;width:550px;"></img>
            </div>
            <img src="http://static.zend.com/topics/no3.png"
                 style="margin-left: 200px; margin-top: 0px; float: left;"></img>
            <p class=p4>
                Log in to the UI using your credentials <a
                    href="http://files.zend.com/help/Zend-Server/zend-server.htm#working_with_authentication.htm"
                    class=link>More info</a>
            </p>
        </div>
        <div id=section2>
            <p class=orange>Use Zend Server to make your PHP apps even better
                than they already are!</p>
            <table align="center">
                <tr>
                    <td style="padding-right: 20px;"><a href="http://www.zend.com/server/redirect/introducing-zend-server"><img
                                src="http://static.zend.com/topics/intro-screen.png"
                                style="width: 150px"></img></a></td>
                    <td style="padding-right: 20px;"><a
                            href="http://www.zend.com/server/redirect/deploying-applications-embed"><img
                                src="http://static.zend.com/topics/deploy-screen.png"
                                style="width: 150px"></img></a></td>
                    <td style="padding-right: 20px;"><a
                            href="http://www.zend.com/server/redirect/working-with-page-caching-in-zend-server-6-embed"><img
                                src="http://static.zend.com/topics/page-cache-screen.png"
                                style="width: 150px"></img></a></td>
                    <td style="padding-right: 20px;"><a
                            href="http://www.zend.com/server/redirect/working-with-code-tracing-in-zend-server-6-embed"><img
                                src="http://static.zend.com/topics/monitor-screen.png"
                                style="width: 150px"></img></a></td>
                    <td><a
                            href="http://www.zend.com/server/redirect/configuring-php"><img
                                src="http://static.zend.com/topics/php-config-screen.png"
                                style="width: 150px"></img></a></td>
                </tr>
                <tr>
                    <td style="padding-left:22px;"><a href="http://www.zend.com/server/redirect/introducing-zend-server"
                                                      class=imagenotes>Zend Server Intro</a></td>
                    <td style="padding-left:25px;"><a href="http://www.zend.com/server/redirect/deploying-applications-embed"
                                                      class=imagenotes>Deploy your app</a></td>
                    <td style="padding-left:10px;"><a href="http://www.zend.com/server/redirect/working-with-page-caching-in-zend-server-6-embed"
                                                      class=imagenotes>Improve performance</a></td>
                    <td style="padding-left:7px;"><a href="http://www.zend.com/server/redirect/working-with-code-tracing-in-zend-server-6-embed"
                                                     class=imagenotes>Troubleshoot your app</a></td>
                    <td><a href="http://www.zend.com/server/redirect/configuring-php"
                           class=imagenotes>Configure your PHP stack</a></td>

                </tr>
            </table>
            <p class=moreinfo1>
                For more info on getting started with Zend Server, click <a
                    href="http://files.zend.com/help/Zend-Server/zend-server.htm#getting_started.htm"
                    class=moreinfolink>here</a>
            </p>
            <p class=moreinfo2>
                For more general info on Zend Server, click <a
                    href="http://www.zend.com/en/products/server/" class=moreinfolink>here</a>
            </p>
        </div>
        <div align="center">
            <a href="http://www.zend.com"><img
                    src="http://static.zend.com/topics/Zend-logo-123x48px.png"
                    style="margin-top: 2em; width: 150px"></img></a>
        </div>
        <div align="center" style="margin-top: 0em;">
            <p style="font-family: arial; font-size: 12px; color: #074f6d;">©
                2018 Rogue Wave Software, Inc. All rights reserved.</p>
        </div>
    </body>
</html>
