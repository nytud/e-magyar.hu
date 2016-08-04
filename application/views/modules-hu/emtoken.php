<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>

            <h3 id="emtoken"><span>emToken</span> - tokenizáló</h3>

            <h4>Az eszközről</h4>
            <h5>Mire jó az eszköz? Mit csinál?</h5>
            <p>Az eszköz megállapítja, hogy a bemenetként megadott magyar nyelvű szövegben hol találhatók a mondat- és szóhatárok. Ez korántsem olyan magától értetődő például akkor, ha egy mondat rövidítést, majd azt követően egy tulajdonnevet tartalmaz, mivel a pont, szóköz, majd nagybetű többnyire mondathatárt jelez.</p>
            <h5>Mi a bemenet?</h5>
            <p>UTF-8 karakterkódolású sima szöveg.</p>
            <h5>Mi a kimenet?</h5>
            <p>Mondatokra és szavakra bontott szöveg.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Bemenet:<br/> <i>A kutya váratlanul ugatni kezdett. Ettől úgy megijedt dr. Thorotzkay Alfréd, hogy hanyatt esett az aszfalton. 
                    Felesége, aki egyébként a BKV Zrt.-nél dolgozik, egyből rohant hozzá, amint ezt megtudta.</i></p>

            <p class="text-left">Kimenet:<br/>
                &lt;s&gt;&lt;w&gt;A&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;kutya&lt;/w&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;váratlanul&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;ugatni&lt;/w&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;kezdett&lt;/w&gt;&lt;c&gt;.&lt;/c&gt;&lt;/s&gt;&lt;ws&gt; &lt;/ws&gt;<br/>&lt;s&gt;&lt;w&gt;Ettől&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;úgy&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;megijedt&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;dr.&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;Thorotzkay&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;Alfréd&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;hogy&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;hanyatt&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;esett&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;az&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;aszfalton&lt;/w&gt;&lt;c&gt;.&lt;/c&gt;&lt;/s&gt;&lt;ws&gt; &lt;/ws&gt;&lt;s&gt;&lt;w&gt;Felesége&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;aki&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;egyébként&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;a&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;BKV&lt;/w&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;Zrt.-nél&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;dolgozik&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;egyből&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;rohant&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;hozzá&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;amint&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;ezt&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;megtudta&lt;/w&gt;&lt;c&gt;.&lt;/c&gt;&lt;/s&gt;</p>

            <p>
                Az &lt;s&gt; ... &lt;/s&gt; tag-ek a mondatok, a &lt;w&gt; ... &lt;/w&gt; a szavak, &lt;c&gt; ... &lt;/c&gt; az írásjelek, a &lt;ws&gt; ... &lt;/ws&gt; pedig a szóközök és egyéb white space karakterek határait jelölik.</p>
            </p>
            <br/>
            <h4>Fejlesztőknek</h4>            

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Forrás</td>
                            <td>
                                forráskód: <a href="https://github.com/dlt-rilmta/quntoken" target="_blank">https://github.com/dlt-rilmta/quntoken</a>
                                <br/>
                                bináris: <a href="https://github.com/dlt-rilmta/quntoken/releases/latest" target="_blank">https://github.com/dlt-rilmta/quntoken/releases/latest</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Forrásnyelv</td>
                            <td>C++ és Python 3</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>UTF-8 kódolású plain text</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>XML és JSON választható</td>
                        </tr>
                        <tr>
                            <td>Futtatás</td>
                            <td>
                                <span class="code">./quntoken [-f FORMAT] FILE</span>
                                <br/>
                                Alapértelmezett kimeneti formátum az xml. Megadható formátumok: xml, json.
                            </td>
                        </tr>
                        <tr>
                            <td>Licensz</td>
                            <td>GNU GPLv3</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>