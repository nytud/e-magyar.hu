<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">

        <article>
            <h3 id="gate"><span>Processing chain, integration</span></h3>

            <h4>GATE integration</h4>
            <p>
                We have integrated the different modules making up <strong>e-magyar.hu</strong> in the GATE language processing framework. One advantage of GATE, which is implemented in Java, is that it provides a convenient method for integrating any number of language processing tool (Processing Resource) in one system. Another of its advantages is a uniform annotation model, which enables the communication between the respective modules.
            </p>
            <p>
                At the beginning of the processing all the spaces in the text are indexed with a number (so-called offset), and from there on every annotation is expressed by a pair of offsets, indicating the beginning and end of the annotation. Information is stored either directly in the annotation (Token), or in the attributes of the annotation (the attribute of the Token word stem). This way the different annotations do not interfere with each other; there can even be overlaps between them. This is a useful solution: every module may  read only the annotation(s) relevant for it, while the output can be written in the existing or newly created annotation. 
                For example: the tokeniser creates Token and SpaceToken units, in accordance with words and spaces; the morphological analyser will only fetch the list of Tokens, running the morphological analysis on these and ignoring the SpaceTokens.
                The modules can be parameterised with respect to which annotations they should be working with, which increases the flexibility of the system even more.
            </p>
            <p>
                Our task is, then, to make every module capable of treating both its input and output according to the GATE annotation model.  An additional task is, if we would like to specify a relation between independent annotations, it must be done explicitly. An obvious example for this is the relation between proper names and the tokens constituting them. Such tasks have been implemented during the integration.
            </p>

            <h4>Modules in the processing chain</h4>
            <p>
                The toolchain <strong>e-magyar.hu</strong> has the following modules integrated in GATE: emToken segments a text into sentences and tokens, emMorph  carries out a morphological analysis and determines possible word stems, emTag disambiguates, i.e. choses the valid morphological analysis and lemma from the possible ones. emDep and emCons carries out syntactic parsing, followed by an additional tool connecting verbs and their respective separable prefixes, returning the prefixed verb stem.
                Finally, emChunk determines noun phrases, while emNer identifies proper names. These later tools add an IOB annotation to a given attribute, which, for a more convenient further processing, is transformed into an independent annotation by an additional tool. 
            </p>

            <h4>Installation</h4>
            The processing chain can be used from the graphical interface of GATE (from the GATE Developer), and can also be run from  a command line, with the help of GATE Embedded.<br/>
            For a use through the graphical interface one needs to apply the simple installation mechanism  of GATE Developer (after having installed GATE itself). This way the <strong>Lang_Hungarian</strong> plugin (contaning the entire toolchain) will be downloaded from the GATE Plugin repository that we had made public, and the toolchain will be integrated into the system.  <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer" target="_blank">further details</a><br/>
            For a use independent of the graphical interface, via a command line, one needs to install GATE, and to clone the github repository <strong>Lang_Hungarian</strong>. Furthermore the (automatic) acquisition of the elements missing in the github repository will be necessary. The system is ready to be used after these steps. <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users" target="_blank">further details</a>

            <h4>Use in GATE Developer</h4>

            <p>
                After installing the <strong>Lang_Hungarian</strong> GATE plugin, which contains the toolchain <strong>e-magyar.hu</strong>, we should carry out the following steps: 
            </p>
            <ol>
                <li>Loading the processing tools: rightclick on <i>Processing Resources</i> in the left panel, and choosing the required tools.</li>
                <li>Creating a new <i>Corpus Pipeline</i> in the <i>Applications</i> section of the left panel. </li>
                <li>Clicking on the newly created <i>Corpus Pipeline</i> and putting together the processing chain by arranging the chosen tools in the list on the right side, following the required order. One should put a <i>Document Reset PR</i> at the top of the list, which will reset the document in its default state before each run. This can be loaded from the <i>ANNIE</i> plugin, which is always at our disposal. </li>
                <li>Creating a <i>Language Resource</i> in the left panel: a new <i>GATE Document</i>, which will contain the text to be processed.</li>
                <li>Creating a corpus from the text: rightclick on the newly created <i>GATE Document</i>, and <i>New Corpus with this Document</i>.</li>
                <li>Clicking on the <i>Corpus Pipeline</i>, then specifying the newly created corpus in the middle of the screen, at <i>Corpus</i>, then clicking on the <i>Run this Application</i> button.</li>
            </ol>

            <p>
                The results can be viewed by clicking on the newly created <i>GATE Document</i>, by switching on the <i>Annotation Sets</i> and the <i>Annotation List</i>. By placing the mouse over the respective units, their annotation becomes visible. 
            </p>
            <p>
                For further details and possibilities of GATE, its <a href="https://gate.ac.uk/sale/tao/split.html" target="_blank">documentation </a> should be consulted. 
            </p>


            <br/>

            <h4>For developers</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Source</td>
                        <td>
                            GATE: <a href="https://gate.ac.uk/download/" target="_blank">https://gate.ac.uk/download/</a> 
                            <br/>
                            Lang_Hungarian GATE plugin: The GATE <strong>Lang_Hungarian</strong> plugin containing the Hungarian processing toolchain is available at the <a href="https://github.com/dlt-rilmta/hunlp-GATE" target="_blank">https://github.com/dlt-rilmta/hunlp-GATE</a>
                            github repository, together with the <em>gate-server</em> application. 
                        </td>
                    </tr>
                    <tr>
                        <td>Source code</td>
                        <td>
                            Primarily Java. 
                            Tools written in Java were integrated  in GATE directly, while modules written in other languages (such as Python or C++) were integrated via their binaries or their own interpreter.
                        </td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>
                            In case of the web page and the <em>gate-server</em> plain text (txt).
                            In case of  using the <em>GATE Developer</em> the system can easily treat several formats (txt, html, xml, doc, xls, docx, xlsx...),
                             automatically extracting their textual content.
                            In the case of HTML and XML files the original markup is preserved, additional information is treated independently of it. 
                        </td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>GATE XML format. The analysed material can be downloaded from the website in .tsv, as well.</td>
                    </tr>
                    <tr>
                        <td>Execution</td>
                        <td>
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer">Installation guide and further information on the</a>
                            <em>GATE Developer</em>.<br/>
                            <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users">Installation guide and further information</a>
                            on the <em>GATE Embedded</em>.
                        </td>
                    </tr>                                
                </table>
            </div>

        </article>

    </div>
</section>
