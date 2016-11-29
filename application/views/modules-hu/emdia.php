<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emdia"><span>emDia</span> - beszélő diarizáló</h3>

            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Az emDial egy több beszélő beszédét tartalmazó hangfelvétel esetében arra a kérdésre ad választ,
                hogy „ki, mikor beszélt?”, ezt hívják beszélődiarizációnak. Képes tehát különbséget tenni a beszédhangok között, és felismerni, 
                amikor az egyik beszélő átveszi a szót a másiktól.</p>
            <h5>Mi a bemenet?</h5>
            <p>A bemenet ez esetben is egy hangfájl (pl .wav, .mp3 formátumban).</p>
            <h5>Mi a kimenet?</h5>
            <p>Egy, a területen használt szabványnak megfelelő (RTTM) szövegfájl, ahonnan soronként leolvasható, hogy a felvétel egyes szakaszain melyik beszélő beszél. Az algoritmus azonban csak a beszélőváltásokat állapítja meg, a beszélők személyazonosságát nem.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Példa egy kimeneti fájl egy részletére (beszélőváltás a felvétel 47. másodpercénél, egy új beszélő szólal meg):</p>
            <p>SPEAKER SpeechNonSpeech 1 46.670 0.300 &lt;NA&gt; &lt;NA&gt; SPK01 &lt;NA&gt;
                <br><span style="color: #308BC1;">SPKR-INFO SpeechNonSpeech 1 &lt;NA&gt; &lt;NA&gt; &lt;NA&gt; unknown SPK16 &lt;NA&gt;</span>
                <br>SPEAKER SpeechNonSpeech 1 46.970 2.220 &lt;NA&gt; &lt;NA&gt; SPK16 &lt;NA&gt;</p>

            <br/>
            
            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td>
                            <a href="https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py" target="_blank">https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td>Python</td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>.wav, .mp3, vagy bármilyen egyéb, a SoX (Sound Exchange) eszköz által támogatott audio formátum</td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>Két, a SHOUT eszköz kiemeneteként előállított, RTTM (Rich Transcription Time Marked) kompatibilis fájl, melyek a megtalált beszéd-zaj-csend, illetve a különböző beszélőkhöz tartozó audio szegmenseket írják le</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td>                            
                            <span class="code">python em-dia.py [-h] [-m SHOUT_MODEL] [-s SAD_FN] input_fn output_dir shout_dir</span>                            
                            <br/>Az egyes argumentumok jelentései leolvashatóak a python em-dia.py --help parancs kiadásával.
                        </td>
                    </tr>
                    <tr>
                        <td>Licenc</td>
                        <td>GPL</td>
                    </tr>                   
                </table>
            </div>

        </article>
    </div>
</section>
