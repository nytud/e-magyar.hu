
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3><span>emChunk</span> - NP Chunker</h3>

            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>emChunk produces two types of output: i) it identifies maximal NPs in the text and ii) it identifies all kinds of phrases in the text.</p>
            <h5>What is the input?</h5>
            <p>Texts that had previously been processed in the toolchain, i.e.: i) they had been segmented into words and sentences
                ii) words are assigned their full morphological analyses. These pieces of information are neccesary for the NP Chunker module to be effective.</p>
            <h5>What is the output?</h5>
            <p>The module assigns a tag to every token in a text that had been segmented into words and sentences. Depending on the two modes of analysis two kinds of tags are possible.
                <br/>In the first case the tag indicates  i) whether the word is part of a maximal noun phrase (NP), and if yes,  ii) whether the NP has a single or more components. If the latter, it also indicates iii) whether the given word is an initial, medial or final component of the NP. 
                In the second case the tag indicates i) whether the given word is part of any phrase, if yes ii) what kind of phrase it is part of, iii) whether the phrase has a single or more components, and if the latter, iv) whether the word is an initial, medial or final component of the NP.
                The output keeps  the analyses of the previous processing levels, and adds the tags of the chunker module.</p>
            <h5>An example:</h5>
            <p>In the first mode we are looking for  maximal NPs in the text, i.e. NPs that are not part of any higher level NPs.
                <br/>In the example sentences we can find two maximal NPs and two units represented with O -- these latter ones are not NPs. 'B' stands for tokens at the beginning of phrases (initial elements), 'I'  for medial / internal elements, and 'E' for final elements.
            <p>
            <p><i>A szállásunk egy Balaton melletti kis üdülőfaluban, Zamárdiban volt.</i></p>
            <div class="table-responsive">
                <table class="table">
                    <tr class="group1">
                        <td>A</td>
                        <td>B-NP</td>
                    </tr>
                    <tr class="group1">
                        <td>szállásunk</td>
                        <td>E-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>egy</td>
                        <td>B-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>Balaton</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>melletti</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>kis</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>üdülőfaluban</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>,</td>
                        <td>I-NP</td>
                    </tr>
                    <tr class="group2">
                        <td>Zamárdiban</td>
                        <td>E-NP</td>
                    </tr>
                    <tr>
                        <td>volt</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>O</td>
                    </tr>
                </table>
            </div>

            <p>In the second way of operation we are identifying every kind of phrase in the sentence..
                <br/>In the sentence above we can find an NP with two components, an NP with a single component, and an ADVP (adverbial phrase) with two components:
            <p>
            <p><i>Az osztály már csütörtökön fel volt villanyozva.</i></p>
            <div class="table-responsive">
                <table class="table">
                    <tr class="group1">
                        <td>Az</td>
                        <td>B-NP</td>
                    </tr>
                    <tr class="group1">
                        <td>osztály</td>
                        <td>E-NP</td>
                    </tr>
                    <tr class="group3">
                        <td>már</td>
                        <td>1-ADVP</td>
                    </tr>
                    <tr class="group2">
                        <td>csütörtökön</td>
                        <td>1-NP</td>
                    </tr>
                    <tr class="group4">
                        <td>teljesen</td>
                        <td>1-ADVP</td>
                    </tr>
                    <tr>
                        <td>fel</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>volt</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>villanyozva</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>O</td>
                    </tr>
                </table>
            </div>

            <br/>

            <h4>For developers</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Source</td>
                        <td><a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a></td>
                    </tr>
                    <tr>
                        <td>Source code</td>
                        <td>Python 3</td>
                    </tr>
                    <tr>
                        <td>Input format</td>
                        <td>Plain text file in UTF-8  character encoding, one row - one word format, sentence boundaries marked by an empty line, first column containing the word, with each annotation tag following it in columns separated by tabs.</td>
                    </tr>
                    <tr>
                        <td>Output formátum</td>
                        <td>Plain text file in UTF-8  character encoding, one row - one word format, sentence boundaries marked by an empty line, first column containing the word, with each annotation tag following it in columns separated by tabs; the last columns containing the Chunker tags.</td>
                    </tr>
                    <tr>
                        <td>Execution</td>
                        <td>See the README file: <a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a></td>
                    </tr>
                    <tr>
                        <td>Licence</td>
                        <td>GNU Lesser General Public License v3.0
                        </td>
                    </tr>               
                </table>
            </div>

        </article>
    </div>
</section>