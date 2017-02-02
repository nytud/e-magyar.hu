
<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3>Overview</h3>
            <br/>
            <p>
                The <strong>e-magyar Open Speech Archive</strong> (em-OSA) has a twofold aim:
                on the one hand to support humanities research (anthropology, folkloritics, ethnography, sociology, history, linguistics, musicology) by archiving sound material and making it available, on the other hand to create an open source speech technology infrastructure. It is open for the public, but its immediate benificiaries would be researchers and students from the above-mentioned fields.
            </p>
            <p>
                The primary focus of the <strong>em-OSA</strong> are sound materials in Hungarian and in Hungary's minority languages (e.g. Lovari or Beash), but both national- and minority languages and dialects of neighbouring countries.
                We primarily rely on materials from Hungary, Romania (Transylvania, Bukarest), areas with a Hungarian-language population in Slovakia (Felvidék), Ukraine (Carpathian Ruthenia), Serbia (Vojvodina), Slovenia and Austria (Burgenland), on research carried out amongst the American diaspora (in the USA, e.g.), just as on openly accessible, uncopyrighted broadcast materials.  In order to avoid copyright violations we do not use musical materials (an exception for this are folk songs recorded during research). Furthermore we only store sound material from any broadcast and not the video. 
                Besides Hungarian, the following languages are represented in our archive: Romanian, Romani, Beash, Slovak, Serbian,Croatian, Slovene, Ukrainian, German, English and Spanish. 
            </p>
            <p>
                <strong>em-OSA</strong> does not carry out independent research or sound recording, but integrates acquired materials. We would like to stress the importance of the material acquired from TK (as from among the existing archives; data providers: Éva Kovács and Judt Gárdos) and that of the 1956 Institute (Oral History Archive; data providers: Gyula Kozák, Ferenc Donáth).  Further materials will be gathered primarily from the partners below (data providers indictaed in brackets): 
            </p>
            <ol>
                <li>National Széchenyi Library (Somlai Katalin, Kőrösi Zsuzsa)</li>
                <li>Institute for Minority Studies, HAS (Feischmidt Margit, Kállai Ernő, Máté Dezső, Papp Z. Attila, Mouraszki András)</li>
                <li>Institute for Sociology, HAS(Neményi Mária, Kóczé Angéla, Janky Béla, Szalay Júlia, Kovács Éva)</li>
                <li>Other national institues (Havas Gábor, Lengyel Gabriella, Németh Szilvia, Zolnay János, Virág Tünde stb.)</li>
                <li>Romania (Erdély, Bukarest)</li>
                <li>Romanian Institute for Research on Minorities, Cluj-Napoca (Fosztó László, Kiss Tamás, Vitos Katalin, Lőrincz József)</li>
                <li>vast material of interviews by Gusztáv Molnár (in Hungarian and Romanian</li>
                <li>Sapientia (Marosvásárhely): Gagyi József (interviews)</li>
                <li>Kriza János Ethnographic Society (Cluj-Napoca): Szabó Töhötöm Babes-Bolyai Egyetem: Tánczos Vilmos, Pozsony Ferenc</li>
                <li>Materials of radio broadcasts from Cluj-Napoca and Târgu Mureș (Maksay Ágnes, Tibád Zoltán)</li>
            </ol>
            <br/>
            <p>
                Besides supporting humanities research, the improvement of Hungarian speech technology is equally important, especially concerning open source tools becoming accessible for both speech technologists and lay users aiming at an automated processing of speech.
            </p>
            <p>
                The most important modules are the following:
            </p>
            <ol>                
                <li>Speech-activity detection: determining whether the given section of a recording contains human speech, or rather music, noise, or other non-linguistic manifestations (cough, laughter, etc.) - emSad</li>
                <li>Identifying the language spoken - emLid</li>
                <li>Speaker diarisation: Telling different speakers apart (e.g. in case of interviews interrogator and respondent), diarisation (making a diary of who spoke when, to the second) - emDia</li>                
            </ol>

            <p>
                In the long run we are hoping to develope speech recognition technologies, as well as technologies based on it (such as automatic transcription software or voice search), but at the moment em-OSA cannot consider these as realistic aims.
            </p>

            <img src="<?= base_url(); ?>css/images/speech-flowchart_<?= $this->config->item('language_abbr'); ?>.png" class="img-responsive" style="margin: 20px auto 0 auto;" />
        </article>
    </div>
</section>

