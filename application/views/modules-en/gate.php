<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">

        <article>
            <h3 id="gate"><span>Processing chain, integration</span></h3>

            <h4>GATE integration</h4>
            <p>
                We have integrated the different modules making up  e-magyar.hu in the GATE language processing framework. One advantage of GATE, which is implemented in Java, is that it provides a convenient method for integrating any number of language processing tool (Processing Resource) in one system. Another of its advantages is a uniform annotation model, which enables the communication between the respective modules.
            </p>
            <p>
                At the beginning of the processing all the spaces in the text are assigned a number (so-called offset), and from there on every annotation is expressed by a pair of offsets, indicating the beginning and end of the annotation. Information is stored either directly in the annotation (Token), or in the attributes of the annotation (the attribute of the Token word stem). This way the different annotation do not interfere with each other; there can even be overlaps between them. This is a useful solution: every module may  read only the annotation relevant for it, while the output can be written in the existing or newly created annotation. 
                For example: the tokeniser creates Token and SpaceToken units, in accordance with words and spaces; the morphological analyser will only fetch the list of Tokens, running the morphological analysis on these and ignoring the SpaceTokens.
                The modules can be parameterised with respect to which annotations they should be working with, which increases the flexibility of the system even more.
            </p>
            <p>
                Our task is, then, to make every module capable of treating both its input and output according to the GATE annotation model.  An additional task is, if we would like to specify a relation between independent annotations, it must be done explicitly. An obvious example for this is the relation between proper names and the tokens constituting them. Such tasks have been implemented during the integration.
            </p>

            <h4>Moduls in the processing chain</h4>
            <p>
                The toolchain e-magyar.hu has the following modules integrated in GATE: emToken segments a text into sentences and tokens, emMorph  carries out a morphological analysis and determines possible word stems, emTag disambiguates, i.e. choses the valid morphological analysis and lemma from the possible ones. emDep and emCons carries out syntactic parsing, followed by an additional tool connecting verbs and their respective separable prefixes, returning the prefixed verb stem.
                Finally, emChunk determines noun phrases, while emNer identifies proper names. These later tools add an IOB annotation to a given attribute, which, for a more convenient further processing, is transformed into an independent annotation by an additional tool. 
            </p>

            <h4>Installation</h4>
            Az elemzőlánc használható a GATE grafikus felületéről, (a GATE Developer-ből), és attól függetlenül paracssorból 
            a GATE Embedded technológia segítségével.<br/>
            A grafikus felületen történő használathoz a GATE telepítése után csupán a GATE Developer saját egyszerű telepítési mechanizmusát 
            kell használni, mely az általunk publikált GATE Plugin repozitóriumból letölti és beilleszti a rendszerbe
            a <strong>Lang_Hungarian</strong> plugint, mely a teljes láncot tartalmazza. <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer" target="_blank">részletek</a><br/>
            A grafikus felülettől független parancssori használathoz a GATE telepítésén kívül szükség van a <strong>Lang_Hungarian</strong> github 
            repozitórium klónozására, a github repozitóriumban meg nem lévő szükséges elemek (automatikus) beszerzésére, 
            és ez után válik használhatóvá a rendszer. <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users" target="_blank">részletek</a>

            <h4>Használat a GATE Developerben</h4>

            <p>
                A <strong>Lang_Hungarian</strong> GATE plugin installálása után, mely az e-magyar.hu elemzőláncot tartalmazza, hajtsuk végre a következő lépéseket: 
            </p>
            <ol>
                <li>Töltsük be a feldolgozóeszközöket: jobbkatt a bal panelen a <i>Processing Resources</i>-ra, és válasszuk ki a listából a kívánt eszközöket.</li>
                <li>A bal panel <i>Applications</i> részében hozzunk létre egy új <i>Corpus Pipeline</i>-t.</li>
                <li>A létrehozott <i>Corpus Pipeline</i>-ra kattintva állítsuk össze a fő panelen a láncot, úgy hogy a kívánt eszközöket a kívánt
                    sorrendben a jobb oldali listába rendezzük. A lista elejére helyezzünk el egy <i>Document Reset PR</i>-t, ami minden futtatás 
                    előtt alaphelyzetbe állítja a dokumentumot. Ezt a mindig rendelkezésre álló <i>ANNIE</i> pluginból tölthetjük be. </li>
                <li>A bal panelen hozzunk létre egy <i>Language Resource</i>-ot: egy új <i>GATE Document</i>-et, ez fogja tartalmazni a feldolgozandó
                    szöveget.</li>
                <li>Készítsünk belőle korpuszt: jobbkatt a létrehozott <i>GATE Document</i>-re, és <i>New Corpus with this Document</i>.</li>
                <li>Kattintsunk a <i>Corpus Pipeline</i>-ra, majd a képernyő közepén, a <i>Corpus</i>-nál, adjuk meg az imént létrehozott korpuszt, és 
                    kattintsunk lent a <i>Run this Application</i> gombra.</li>
            </ol>

            <p>
                Az eredményeket a létrehozott <i>GATE Document</i>-re kattintva tekinthetjük meg az <i>Annotation Sets</i> és az <i>Annotation List</i> 
                bekapcsolásával. Az egyes egységek fölé állítva az egeret, megjelenik az adott egységre vonatkozó annotáció. 
            </p>
            <p>
                A GATE használatának további részletei és lehetőségei tekintetében a <a href="https://gate.ac.uk/sale/tao/split.html" target="_blank">GATE dokumentációjára</a> utalunk. 
            </p>


            <br/>

            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td>
                            GATE: <a href="https://gate.ac.uk/download/" target="_blank">https://gate.ac.uk/download/</a> 
                            <br/>
                            Lang_Hungarian GATE plugin: A magyar nyelvfeldolgozó eszközöket tartalmazó
                            GATE <strong>Lang_Hungarian</strong> plugin a
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE" target="_blank">https://github.com/dlt-rilmta/hunlp-GATE</a>
                            github repozitóriumban érhető el a <em>gate-server</em> alkalmazással együtt.
                        </td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td>
                            Elsősorban java. 
                            A java nyelven írt GATE rendszerbe a java eszközöket
                            közvetlenül lehetett integrálni,
                            az egyéb nyelveken (python, C++) írt modulok
                            pedig a binárisok vagy saját interpreterük használatával épülnek be.
                        </td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>
                            A honlap és a <em>gate-server</em> esetében egyszerű szöveg (txt).
                            A <em>GATE Developer</em>  esetében viszont kényelmesen
                            kezelhetünk számos formátumot
                            (txt, html, xml, doc, xls, docx, xlsx...),
                            belőlük a rendszer automatikusan kinyeri a szöveges tartalmat.
                            HTML illetve XML esetén az eredeti markup megőrződik,
                            a hozzáadott információ az eredeti markuptól függetlenül kezelődik.
                        </td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>GATE XML formátum. A honlapról az elemzett anyag .tsv-ben is letölthető.</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td>
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer">Telepítés, információk</a>
                            a <em>GATE Developer</em> -hez.<br/>
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users">Telepítés, információk</a>
                            a <em>GATE Embedded</em> -hez.
                        </td>
                    </tr>                                
                </table>
            </div>

        </article>

    </div>
</section>
