
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3>Áttekintés</h3>
            <br/>
            <p>
                Az <strong>e-magyar.hu</strong> Digitális Nyelvfeldolgozó Rendszer lényege, hogy az emberi intelligenciát igénylő szövegolvasási, 
                szövegértési feladat alapvető, kezdeti lépéseit automatikusan valósítja meg: a szöveg nyelvi jellemzőit automatikus módon fedi fel,
                teszi explicitté. 
                Egy tetszőleges szövegrészt feldolgozva megtudjuk az egyes szavak szófaját, szótövét, alaktani (morfológiai) elemzését,
                a mondatok kétféle mondattani (szintaktikai) elemzését, megkapjuk a főnévi csoportokat és a tulajdonneveket. 
                A rendszer egybegyűjti, egy egységes láncba integrálja és közzéteszi az elemzési lépéseket megvalósító számítógépes magyar 
                nyelvfeldolgozó eszközöket. Ezáltal elérhetővé, közvetlenül felhasználhatóvá válnak ezek az eszközök a különféle igényű
                felhasználói körök számára.
            </p>
            <p>
                Az e-magyar.hu rendszer szövegfeldolgozó része jelenleg az alább modulokat tartalmazza:         
            </p>
            <ul>
                <li>Szövegegység tagoló (tokenizáló) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emtoken">emToken</a></li>
                <li>Morfológiai elemző – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emmorph">emMorph</a></li>
                <li>Szótövező (lemmatizáló) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emlem">emLem</a></li>
                <li>Egyértelműsítő (tagger) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emtag">emTag</a></li>
                <li>Függőségi mondatelemző (dependency parser) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emdep">emDep</a></li>
                <li>Összetevős mondatelemző (constituent parser) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emcons">emCons</a></li>
                <li>Részleges mondatelemző (chunker) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emchunk">emChunk</a></li>
                <li>Névkifejezés elemző (named entity recognizer) – 
                    <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emner">emNer</a></li>
            </ul>
            <p>
                Az egyes eszközök működésének leírása az adott eszköznél található.         
            </p>

            <h4>Példa</h4>
            <p>
                <i>Bár külföldre menekülhetett volna, nem tette meg. Támogatta a haladó eszméket, barátságban állt pl. Jókai Mórral is.</i> 
            </p>
            <p>
                Az <strong>e-magyar.hu</strong> a szöveg automatikus feldolgozása során először a szöveget az alapegységeire,
                a szavakat és írásjeleket magában foglaló ún. tokenekre bontja és megállapítja a mondatok határát.
                A példában a <i>Támogatta</i> új mondatot kezd, a <i>Jókai</i> viszont nem, bár itt is pont után nagybetűs szó következik, 
                ami tipikusan mondathatárra utal. Külön tokenként kezeli az írásjeleket, kivéve persze a rövidítéseknél, ahol a záró pont a rövidítés részét
                képezi, így a <i>pl.</i> egy egység lesz, az <i>is</i> és az azt követő pont viszont kettő.
            </p>
            <p>
                Megkapjuk az egyes szavakról az alaktani információkat: a <i>menekülhetett</i> szóalak például múlt idejű ige, mely a <i>menekül</i> szótőből, a <i>het</i>
                képzőből és az <i>ett</i> igeragból épül fel.
            </p>
            <p>
                A magyar szóalakok jelentős részének, akár 30%-ának több alaktani elemzése van. A rendszer a szövegkönyezet alapján automatikusan
                dönt ilyen esetekben, kiválasztja a helyes elemzést, ez az ún. egyértelműsítési lépés. A többértelműség sokszor nem olyan nyilvánvaló,
                mint a <i>várnak</i> vagy a <i>terem</i> esetében, hanem rejtetten jelenik meg: fontos, hogy példánkban a <i>haladó</i>
                melléknévként elemződjön, ne pedig összetett főnévként, ami valamiféle vízi élőlényekre vonatkozó járulékot jelentene.
            </p>
            <p>
                Az egyes mondatok mondattani elemzése kétféleképpen is megtörténik. Megkapjuk az ún. függőségi elemzést, ahol az egyes szavak 
                egymáshoz való kapcsolatai jelennek meg, mint például, hogy a <i>barátságban</i> az <i>állt</i> igéhez kapcsolódó határozó.
                Az összetevős elemzés pedig a mondat egységeit adja ki: a második mondat két nagyobb egységből áll, melyek felsorolás viszonyban
                vannak egymással. A függőségi elemzés alapján az ige-igekötő kapcsolatok is rendelkezésre állnak, erre építve egy külön 
                segédmodul megjelöli az elváló igekötőket, és a hozzájuk tartozó igéket, példánkban a <i>tette</i> és a <i>meg</i> kapcsolatát.                
            </p>
            <p>
                A főnévi csoportokat – pl. <i>a haladó eszméket</i> – is azonosítja egy erre a célra készített modul.
            </p>
            <p>
                Végül a lánc utolsó tagja megjelöli a tulajdonnevek fontos alosztályait, a neveket, helyeket és intézményeket, 
                példánkban a <i>Jókai Mórral</i> nevet.
            </p>
            
            <img src="<?= base_url(); ?>css/images/text-flowchart.png" class="img-responsive" style="margin: 20px auto 0 auto;" />
            
        </article>
    </div>
</section>
