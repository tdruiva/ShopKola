<?php echo preg_match('/^(?!(?>"?(?>\\\[ -~]|[^"])"?){255,})(?!"?(?>\\\[ -~]|[^"]){65,}"?@)(?>([!#-\'*+\/-9=?^-~-]+)(?>\.(?1))*|"(?>[ !#-\[\]-~]|\\\[ -~])*")@(?!.*[^.]{64,})(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)(?>\.(?2)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?3)){7}|(?!(?:.*[a-f0-9][:\]]){7,})((?3)(?>:(?3)){0,5})?::(?4)?))|(?>(?>IPv6:(?>(?3)(?>:(?3)){5}:|(?!(?:.*[a-f0-9]:){5,})(?5)?::(?>((?3)(?>:(?3)){0,3}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])(?>\.(?6)){3}))\])$/iD', "lalala@filmow.com"); ?>