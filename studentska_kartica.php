<?php
	if (!defined('APP_KEY') or APP_KEY != '12345678') {
		header("Location: ./");
	}
    
    if(isset ($_COOKIE["broj_kartice"]) && isset ($_COOKIE["isic_broj"])){
        $_POST["uplata"] = "uplata";
        $_POST["tbBrojKartice"] = $_COOKIE["broj_kartice"];
        $_POST["tbIsicBroj"] = $_COOKIE["isic_broj"];
        session_start();
        $_SESSION["app_key"] = APP_KEY;
        $_SESSION["post_podaci"] = $_POST;
        header("Location: ./obrada_kartice.php");
    }
?>
<div id="kartica-sadrzaj">
<div id="kartica-sadrzaj-tabela">
    <form action="obrada_kartice.php" method="post" name="kartica-forma" id="kartica-forma">
        <?php
            $const = APP_KEY;
            echo "<input type='hidden' id='const' name='const' value=\"$const\"/>";
        ?>
        <table>
            <tr>
                <td>
					<label for="tbBrojKartice">Broj kartice</label>
				</td>
				<td>
					<input type="text" id="tbBrojKartice" name="tbBrojKartice" class="broj" maxlength="9" placeholder="Broj kartice" autocomplete="off"/>
					<div class="poruka">
						<span>Broj kartice nije u dobrom formatu</span>
					</div>
				</td>
            </tr>
            <tr>
                <td>
					<label for="tbIsicBroj">ISIC broj</label>
				</td>
				<td>
					<input type="text" id="tbIsicBroj" name="tbIsicBroj" class="broj" maxlength="19" placeholder="ISIC broj" autocomplete="off"/>
					<div class="poruka">
						<span>ISIC broj nije u dobrom formatu</span>
					</div>
				</td>
            </tr>
            <tr>
                <td>
                    <button id="provera" name="provera" type="submit" value="provera">Proveri stanje</button>
                </td>
                <td>
                    <button id="uplata" name="uplata" type="submit" value="uplata">Izvrši uplatu</button>
                </td>
            </tr>
        </table>
    </form>
</div>    
</div>