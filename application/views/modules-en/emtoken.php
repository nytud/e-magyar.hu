<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>

            <h3 id="emtoken"><span>emToken</span> - Tokeniser</h3>

            <h4>About the tool</h4>
            <h5>What is this tool for? What does it do?</h5>
            <p>The tool determines sentence- and word boundaries in an input text. This task is not at all self-explanatory if there are abbreviations followed by person names, since a period followed by a word starting with an initial capital usually signals sentence boundary.</p>
            <h5>What is an input text?</h5>
            <p>It is plain text in UTF-8 encoding.</p>
            <h5>What is the output?</h5>
            <p>It is text segmented into sentences and words.</p>
            <h5>An example of the segmentation:</h5>
            <p>Input:<br/> <i>A kutya váratlanul ugatni kezdett. Ettől úgy megijedt dr. Thorotzkay Alfréd, hogy hanyatt esett az aszfalton. 
                    Felesége, aki egyébként a BKV Zrt.-nél dolgozik, egyből rohant hozzá, amint ezt megtudta.</i></p>

            <p class="text-left">Output:<br/>
                &lt;s&gt;&lt;w&gt;A&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;kutya&lt;/w&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;váratlanul&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;ugatni&lt;/w&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;kezdett&lt;/w&gt;&lt;c&gt;.&lt;/c&gt;&lt;/s&gt;&lt;ws&gt; &lt;/ws&gt;<br/>&lt;s&gt;&lt;w&gt;Ettől&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;úgy&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;megijedt&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;dr.&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;Thorotzkay&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;Alfréd&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;hogy&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;hanyatt&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;esett&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;az&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;aszfalton&lt;/w&gt;&lt;c&gt;.&lt;/c&gt;&lt;/s&gt;&lt;ws&gt; &lt;/ws&gt;&lt;s&gt;&lt;w&gt;Felesége&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;aki&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;egyébként&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;a&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;BKV&lt;/w&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;Zrt.-nél&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;dolgozik&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt;&lt;/ws&gt;&lt;w&gt;egyből&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;rohant&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;hozzá&lt;/w&gt;&lt;c&gt;,&lt;/c&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;amint&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;ezt&lt;/w&gt;&lt;ws&gt; &lt;/ws&gt;&lt;w&gt;megtudta&lt;/w&gt;&lt;c&gt;.&lt;/c&gt;&lt;/s&gt;</p>

            <p>
                &lt;s&gt; ... &lt;/s&gt; tags mark sentence boundaries, &lt;w&gt; ... &lt;/w&gt; tags word boundaries, &lt;c&gt; ... &lt;/c&gt; punctuation, while &lt;ws&gt; ... &lt;/ws&gt; tags mark the boundaries of space and other whitespace characters.</p>
            </p>
            <br/>
            <h4>For developers:</h4>            

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Source</td>
                            <td>
                                Sourcecode: <a href="https://github.com/dlt-rilmta/quntoken" target="_blank">https://github.com/dlt-rilmta/quntoken</a>
                                <br/>
                                binary: <a href="https://github.com/dlt-rilmta/quntoken/releases/latest" target="_blank">https://github.com/dlt-rilmta/quntoken/releases/latest</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Source language</td>
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
                            <td>Execution</td>
                            <td>
                                <span class="code">./quntoken [-f FORMAT] FILE</span>
                                <br/>
                                Default output format is xml. Other possible formats:: xml, json.
                            </td>
                        </tr>
                        <tr>
                            <td>Licence</td>
                            <td>GNU GPLv3</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>