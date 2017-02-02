
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3>Áttekintés</h3>
            <br/>
            <p>
                Az <strong>e-magyar Nyílt Beszédarchívum</strong> (Open Speech Archive, em-OSA) célja kettős:
                egyrészt az embertudományi kutatások (antropológia, folklorisztika,
                néprajz, nyelvészet, szociológia, szociográfia, történettudomány,
                zenetudomány) támogatása a hanganyagok megőrzésével és nyilvánossá
                tételével, másrészt nyilt szoftveren alapuló beszédtechnológiai
                infrastruktúra létrehozása. A nagyközönseg számára is nyitva áll, de
                közvetlen hasznát elsősorban a fenti területek kutatói, illetve az
                ezekről tanuló diákok látják.
            </p>
            <p>
                Az em-OSA elsődleges fókusza a magyar és magyarországi kisebbségi
                (pl. lovári, beás, stb.)  hanganyagok, de támogatjuk a környező országok
                nemzeti és kisebbségi nyelveit, nyelvjárásait is. Elsődleges forrásaink
                ennek megfelelően Magyarország, Románia (Erdély, Bukarest), Szlovákia
                (Felvidék), Ukrajna (Kárpátalja), Szerbia (Vajdaság), Szlovénia, Ausztria
                (Burgenland), és az amerikai (USA, stb) diaszpóra körében végzett
                kutatások, illetve ezen országok nyiltan letölthető, szerzői jogvédelem
                alatt nem álló műsoros anyagai. A copyright-visszaélések elkerülése
                érdekében kerüljük a zenés anyagokat (kivétel a kutatásban rögzített
                népdalok), és a műsoroknak csak a hang-anyagát tároljuk, a videót nem.
                A magyaron kívül a rendszerben jelenleg a következő nyelveken van anyag:
                román, cigány, beás, szlovák, szerb, horvát, szlovén, ukrán, német, angol
                spanyol.
            </p>
            <p>
                Az em-OSA önálló kutatást, hangrögzítést nem végez, de integrálja
                ilyenek anyagát: a már meglevő archívumok közül a TK (adatgazdák
                Kovács Éva, Gárdos Judit), a frissen nyilvánosságra kerülők közül a
                volt 56-os Intézet anyagait (Kozák Gyula, Donáth Ferenc) emeljük
                ki. Ezeken kívül a katalógus fő hazai elemei lesznek (zárójelben az
                adatgazdák):
            </p>
            <ol>
                <li>OSzK (Somlai Katalin, Kőrösi Zsuzsa)</li>
                <li>MTA Kisebbségkutató (Feischmidt Margit, Kállai Ernő, Máté Dezső, Papp Z. Attila, Mouraszki András)</li>
                <li>MTA Szociológai Intézet (Neményi Mária, Kóczé Angéla, Janky Béla, Szalay Júlia, Kovács Éva)</li>
                <li>Más hazai intézetek (Havas Gábor, Lengyel Gabriella, Németh Szilvia, Zolnay János, Virág Tünde stb.)</li>
                <li>Románia (Erdély, Bukarest)</li>
                <li>Kisebbségkutató Kolozsvár (Fosztó László, Kiss Tamás, Vitos Katalin, Lőrincz József)</li>
                <li>Molnár Gusztáv hatalmas interjú anyaga (magyarul, románul)</li>
                <li>Sapientia (Marosvásárhely): Gagyi József (interjúk)</li>
                <li>Kriza Társaság (Kolozsvár): Szabó Töhötöm Babes-Bolyai Egyetem: Tánczos Vilmos, Pozsony Ferenc</li>
                <li>Kolozsvári, Marosvásárhelyi Rádió anyagai (Maksay Ágnes, Tibád Zoltán)</li>
            </ol>
            <br/>
            <p>
                Az embertudományi kutatások mellett egyenrangúan fontos a magyar
                számítógépes beszédtechnológia fejlesztése különösen abban a
                tekintetben, hogy nyílt forráskódú eszközök váljanak mind a
                beszédtechnológusok, mind a beszéd számitógépes feldolgozására
                készülő de beszédtechnológiában járatlan felhasználók számára.
            </p>
            <p>
                A főbb eszközcsaládok a következők:
            </p>
            <ol>                
                <li>Beszéd-aktivitás felismerése. Tartalmaz-e a felvétel egy adott szakasza beszédet, vagy csak zenét, zajokat, vagy egyéb nem-nyelvi
                    megnyilvánulásokat (pl. krákogás, köhögés, nevetés) - emSad</li>
                <li>A beszélt nyelv beazonosítása - emLid</li>
                <li>Az egyes beszéők elkülönítése (pl. interjúknál a kérdező és a válaszadó), naplókészítés (diarizáció) másodperces pontossággal - emDia</li>                
            </ol>

            <p>
                Hosszú távon célunknak tekintjük a beszédfelismerés, és az ezen alapuló technológiák (automikus leirat-készítés, hangalapú keresés)
                feljesztését is, de az em-OSA erre ma még nem vállalkozik.
            </p>

            <img src="<?= base_url(); ?>css/images/speech-flowchart_<?= $this->config->item('language_abbr'); ?>.png" class="img-responsive" style="margin: 20px auto 0 auto;" />
        </article>
    </div>
</section>

