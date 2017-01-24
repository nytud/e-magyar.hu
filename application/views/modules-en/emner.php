<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emner"><span>emNer</span> - tulajdonnév-felismerő</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>The automatic Named Entity Recogniser emNer identifies proper names in a running text, and 
                assigns them to one of the predetermined categories (person names, organisation names, place names or other).</p>
            <h5>What is the input?</h5>
            <p>Texts that had previously been processed in the toolchain, i.e.: i) they had been segmented into words and sentences
                ii) words are assigned their full morphological analyses. These pieces of information are neccesary for the NER tagger 
                module to be effective.</p>
            <h5>What is the output?</h5>
            <p>The module assigns a tag to every token in a text that had been segmented into words and sentences, indicating i) whether
               the given word is a propoer noun, and if yes, ii) what subcass it belongs to, iii) whether it has a single or more elements,
                and if the latter, iv) whether the given word has an initial, medial or final position in the Named Entity. 
                <br>The output keeps  the analyses of the previous processing levels, and adds the tags of the NER Tagger module..</p>
            <h5>An example:</h5>
            <p>Every token in the example sentence is tagged with one of the tags below 0 = not a proper noun, B-PER: initial element of a 
            multiword person name, E-PER: final element of a multiword person name, B-ORG: initial element of a multiword organisation name, 
            E-ORG: final element ofa multiword organisation name, 1-ORG: a single-word organisation name.</p>
            
            <p><i>[...] közölte Wolf László, az OTP Bank vezérigazgató-helyettese az MTI érdeklődésére.</i></p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>közölte</td>
                        <td>0</td>
                    </tr>
                    <tr class="group1">
                        <td>Wolf</td>
                        <td>B-PER</td>
                    </tr>
                    <tr class="group1">
                        <td>László</td>
                        <td>E-PER</td>
                    </tr>
                    <tr>
                        <td>,</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>az</td>
                        <td>0</td>
                    </tr>
                    <tr class="group1">
                        <td>OTP</td>
                        <td>B-ORG</td>
                    </tr>
                    <tr class="group1">
                        <td>Bank</td>
                        <td>E-ORG</td>
                    </tr>
                    <tr>
                        <td>vezérigazgató-helyettese</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>az</td>
                        <td>0</td>
                    </tr>
                    <tr class="group1">
                        <td>MTI</td>
                        <td>1-ORG</td>
                    </tr>
                    <tr>
                        <td>érdeklődésére</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>0</td>
                    </tr>
                </table>
            </div>
            <br/>

            <h4>For developers</h4>       

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Source</td>
                            <td>
                                <a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a>                         
                            </td>
                        </tr>
                        <tr>
                            <td>Source language</td>
                            <td>Python 3</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>Plain text file in UTF-8  character encoding, one row - one word format, sentence boundaries marked by an empty line, first column containing the word, with each annotation tag following it in columns separated by tabs.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>The same as the input, with the last colums containing the NER tags.</td>
                        </tr>
                        <tr>
                            <td>Execution</td>
                            <td>
                                See in the README file. <!--<a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a>-->
                            </td>
                        </tr>
                        <tr>
                            <td>Licence</td>
                            <td>GNU Lesser General Public License v3.0</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>