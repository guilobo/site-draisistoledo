<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class NaMidiaSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (! $user) {
            $this->command->error('Nenhum usuário encontrado. Crie um usuário admin primeiro.');
            return;
        }

        $category = Category::firstOrCreate(
            ['slug' => 'na-midia'],
            ['name' => 'Na Mídia', 'description' => 'Aparições da Dra. Isis Toledo na mídia televisiva, radiofônica e digital.']
        );

        $posts = [
            [
                'title'        => 'Emagrecedores manipulados: O alerta sobre o uso sem acompanhamento médico – SC Acontece',
                'slug'         => 'emagrecedores-manipulados-o-alerta-sobre-o-uso-sem-acompanhamento-medico-sc-acontece',
                'date'         => '2025-12-19',
                'tag'          => 'SC Acontece',
                'seo_title'    => 'Emagrecedores manipulados: riscos do uso sem supervisão médica',
                'excerpt'      => 'Em entrevista ao programa SC Acontece, a Dra. Isis Toledo alerta para os riscos do uso de emagrecedores manipulados sem acompanhamento médico.',
                'youtube_id'   => null,
                'image'        => 'midia/sc-acontece-emagrecedores.png',
                'content'      => '<p>Em entrevista ao programa <strong>SC Acontece</strong>, a Dra. Isis Toledo alertou sobre os riscos associados ao uso de medicamentos emagrecedores manipulados sem acompanhamento médico.</p><p>A médica ressaltou que "o consumo indiscriminado dessas fórmulas pode trazer sérios prejuízos à saúde, incluindo efeitos colaterais cardiovasculares, hormonais e metabólicos". A Dra. Toledo enfatiza que o emagrecimento deve ser individualizado, seguro e baseado em avaliação clínica, destacando a necessidade de supervisão médica para alcançar resultados eficazes sem comprometer a saúde.</p>',
            ],
            [
                'title'        => 'Farmácias devem reter receita para venda de remédios contra obesidade',
                'slug'         => 'farmacias-devem-reter-receita-para-venda-de-remedios-contra-obesidade',
                'date'         => '2025-06-23',
                'tag'          => 'Notícia',
                'seo_title'    => 'Anvisa obriga retenção de receita para remédios contra obesidade',
                'excerpt'      => 'Entrou em vigor a nova exigência da Anvisa que obriga farmácias de todo o Brasil a reter a receita médica ao vender remédios para o tratamento da obesidade.',
                'youtube_id'   => 'mxdOC_IsFiM',
                'image'        => 'midia/farmacias-receita.png',
                'content'      => '<p>Entrou em vigor a nova exigência da Anvisa que obriga farmácias de todo o Brasil a reter a receita médica ao vender remédios para tratamento da obesidade. A medida visa controlar o uso indiscriminado desses produtos e reforçar o acompanhamento médico no processo de emagrecimento.</p>',
            ],
            [
                'title'        => 'Emagrecer com saúde: especialista explica medicamentos para tratamento – SC Acontece',
                'slug'         => 'emagrecer-com-saude-especialista-explica-medicamentos-para-tratamento-sc-acontece',
                'date'         => '2024-10-15',
                'tag'          => 'SC Acontece',
                'seo_title'    => 'Emagrecer com saúde: medicamentos e acompanhamento médico',
                'excerpt'      => 'A Dra. Isis Toledo explora os desafios do emagrecimento saudável e o papel essencial do acompanhamento médico no tratamento da obesidade.',
                'youtube_id'   => 'uXFG4L1Y3yk',
                'image'        => 'midia/sc-acontece-emagrecer.png',
                'content'      => '<p>Neste vídeo do programa <strong>SC Acontece</strong>, a Dra. Isis Toledo explora os desafios do emagrecimento saudável e o papel essencial do acompanhamento médico no tratamento da obesidade.</p><p>Uma paciente compartilha sua experiência de perda de peso e como isso impactou positivamente sua saúde e seu tratamento contra o câncer de mama. Especialistas enfatizam a importância de combinar "medicamentos específicos, uma dieta balanceada e o suporte médico contínuo" para resultados duradouros e minimização de efeitos colaterais.</p>',
            ],
            [
                'title'        => "'Papo de Padaria': cuidados para prevenir a obesidade infantil",
                'slug'         => 'papo-de-padaria-cuidados-para-prevenir-a-obesidade-infantil',
                'date'         => '2024-10-10',
                'tag'          => 'Globoplay',
                'seo_title'    => 'Como prevenir a obesidade infantil: dicas da endocrinologista',
                'excerpt'      => 'A Dra. Isis Toledo participou de uma entrevista no Globoplay na qual compartilhou dicas essenciais para prevenir a obesidade infantil.',
                'youtube_id'   => null,
                'image'        => 'midia/papo-de-padaria.png',
                'content'      => '<p>A Dra. Isis Toledo participou de uma entrevista no <strong>Globoplay</strong>, na qual compartilhou dicas essenciais para prevenir a obesidade infantil. Ela abordou práticas de cuidado e hábitos saudáveis que podem ser adotados no dia a dia, além da importância de envolver toda a família nesse processo de prevenção.</p><p><a href="https://globoplay.globo.com/v/13004285/" target="_blank" rel="noopener noreferrer">▶ Assistir à entrevista completa no Globoplay</a></p>',
            ],
            [
                'title'        => 'Avanço da obesidade infantil',
                'slug'         => 'avanco-da-obesidade-infantil',
                'date'         => '2024-10-09',
                'tag'          => 'Clube do Champanhe',
                'seo_title'    => 'Obesidade infantil: causas, prevenção e tratamento',
                'excerpt'      => 'Dra. Isis Toledo compartilhou sua visão especializada sobre obesidade infantil em uma entrevista para o Clube do Champanhe.',
                'youtube_id'   => null,
                'image'        => 'midia/clube-do-champanhe.webp',
                'content'      => '<p>Dra. Isis Toledo compartilhou sua visão especializada sobre obesidade infantil em uma entrevista para o <strong>Clube do Champanhe</strong>, abordando os avanços e desafios no enfrentamento dessa questão de saúde pública. Em seu depoimento, ela discute fatores contribuintes, prevenções e o papel da comunidade na promoção de hábitos saudáveis para as crianças.</p><p><a href="https://www.clubedochampanhe.com.br/materia/avanco-da-obesidade-infantil" target="_blank" rel="noopener noreferrer">▶ Ver matéria completa no Clube do Champanhe</a></p>',
            ],
            [
                'title'        => 'FloripaCast – Dicas para uma boa alimentação',
                'slug'         => 'floripacast-isis-toledo-endocrinologista-e-metabologista-dicas-para-uma-boa-alimentacao',
                'date'         => '2024-07-18',
                'tag'          => 'FloripaCast',
                'seo_title'    => 'Alimentação equilibrada e saudável: dicas da endocrinologista',
                'excerpt'      => 'A Dra. Isis Toledo foi convidada pelo FloripaCast para compartilhar orientações valiosas sobre como manter uma alimentação equilibrada e saudável.',
                'youtube_id'   => 'JUT-6AvdsME',
                'image'        => 'midia/floripacast.jpg',
                'content'      => '<p>A Dra. Isis Toledo foi convidada pelo <strong>FloripaCast</strong> para compartilhar orientações valiosas sobre como manter uma alimentação equilibrada e saudável. Ela apresentou práticas simples e acessíveis para ajudar as pessoas a fazerem escolhas alimentares mais conscientes, com foco no bem-estar e na qualidade de vida.</p>',
            ],
            [
                'title'        => 'Momento SBA – Vida em Equilíbrio + Saúde contra o Diabetes',
                'slug'         => 'momento-sba-vida-em-equilibrio-saude-contra-o-diabetes',
                'date'         => '2024-06-28',
                'tag'          => 'SBA',
                'seo_title'    => 'Diabetes: vida em equilíbrio e estratégias de prevenção',
                'excerpt'      => 'A Dra. Isis Toledo participa do Momento SBA falando sobre vida em equilíbrio e saúde no combate ao diabetes.',
                'youtube_id'   => 'u2YkaQs7Zqw',
                'image'        => 'midia/momento-sba.jpg',
                'content'      => '<p>A Dra. Isis Toledo participou do <strong>Momento SBA</strong>, falando sobre vida em equilíbrio e saúde no combate ao diabetes. Uma discussão profunda sobre prevenção e tratamento dessa doença que afeta milhões de brasileiros.</p>',
            ],
            [
                'title'        => 'Conexão News – JP News Floripa',
                'slug'         => 'conexao-news-06-06-jp-news-floripa',
                'date'         => '2024-06-06',
                'tag'          => 'JP News Floripa',
                'seo_title'    => 'Saúde metabólica e hormonal: entrevista na Jovem Pan News',
                'excerpt'      => 'Participação da Dra. Isis Toledo no programa Conexão News da JP News Floripa (Jovem Pan News).',
                'youtube_id'   => 'IUqr3F6sHEI',
                'image'        => 'midia/conexao-news.jpg',
                'content'      => '<p>A Dra. Isis Toledo participou do programa <strong>Conexão News</strong> da <strong>JP News Floripa</strong> (Jovem Pan News Florianópolis), abordando temas relevantes sobre saúde e bem-estar.</p>',
            ],
            [
                'title'        => 'Bom Dia Santa Catarina – Dia Mundial da Obesidade',
                'slug'         => 'bom-dia-santa-catarina-dia-mundial-da-obesidade-globoplay',
                'date'         => '2024-03-04',
                'tag'          => 'NSC TV / Globo',
                'seo_title'    => 'Dia Mundial da Obesidade: tratamento e acompanhamento médico',
                'excerpt'      => 'No programa Bom Dia Santa Catarina, a Dra. Isis Toledo reforça a importância do acompanhamento médico para quem busca emagrecer.',
                'youtube_id'   => 'aU4lqgzIeUo',
                'image'        => 'midia/bom-dia-sc.jpg',
                'content'      => '<p>No programa <strong>Bom Dia Santa Catarina</strong> do Globoplay/NSC TV, em alusão ao Dia Mundial da Obesidade, a Dra. Isis Toledo reforçou a importância do acompanhamento médico para quem busca emagrecer com saúde e segurança.</p>',
            ],
            [
                'title'        => 'Programa BAND CIDADE SC',
                'slug'         => 'programa-band-cidade-sc',
                'date'         => '2023-07-24',
                'tag'          => 'Band News SC',
                'seo_title'    => 'Obesidade afeta 5 em 10 brasileiros: riscos e tratamentos',
                'excerpt'      => 'A Dra. Isis Toledo discute no Programa Band Cidade SC a obesidade e seus riscos, que afetam 5 em cada 10 brasileiros.',
                'youtube_id'   => 'zpxSPTM9TfE',
                'image'        => 'midia/band-cidade-sc.png',
                'content'      => '<p>No <strong>Programa Band Cidade SC</strong>, a Dra. Isis Toledo discutiu sobre a obesidade e seus riscos à saúde, destacando que "5 em cada 10 brasileiros" enfrentam este problema de saúde pública. A médica falou sobre as opções de tratamento disponíveis e a importância de buscar ajuda médica especializada.</p>',
            ],
            [
                'title'        => 'NSC Notícias – Semaglutida: o emagrecedor mais buscado',
                'slug'         => 'nsc-noticias',
                'date'         => '2023-01-30',
                'tag'          => 'NSC TV / Globo',
                'seo_title'    => 'Semaglutida: como funciona a caneta emagrecedora',
                'excerpt'      => 'No programa NSC Notícias, a Dra. Isis Toledo falou sobre o uso da semaglutida e o tratamento da obesidade.',
                'youtube_id'   => 'nb-6NctFohY',
                'image'        => 'midia/nsc-noticias.jpg',
                'content'      => '<p>No programa <strong>NSC Notícias</strong> da NSC TV (filiada à Rede Globo), a Dra. Isis Toledo falou sobre o uso da semaglutida, conhecida como a "caneta emagrecedora", e seu papel no tratamento da obesidade. A médica explicou o mecanismo de ação do medicamento e a importância do uso com acompanhamento médico adequado.</p>',
            ],
            [
                'title'        => 'Tarde é Nossa – Janeiro Seco: os benefícios do Dry January',
                'slug'         => 'tarde-e-nossa',
                'date'         => '2023-01-17',
                'tag'          => 'SBT',
                'seo_title'    => 'Janeiro Seco (Dry January): benefícios para o metabolismo',
                'excerpt'      => 'Durante sua participação no programa A Tarde é Nossa do SBT, a Dra. Isis Toledo explica os benefícios do Janeiro Seco (Dry January).',
                'youtube_id'   => 'D9ZeEKSi_iU',
                'image'        => 'midia/tarde-e-nossa-janeiro-seco.jpg',
                'content'      => '<p>Você sabe o que é <strong>Janeiro Seco</strong> (Dry January)? Durante sua participação no programa <strong>A Tarde é Nossa</strong> do SBT, a Dra. Isis Toledo explicou os benefícios de ficar 30 dias sem consumir álcool para a saúde metabólica, hepática e hormonal.</p>',
            ],
            [
                'title'        => 'CBNFloripa – Avanços no tratamento da obesidade',
                'slug'         => 'cbnfloripa',
                'date'         => '2023-01-17',
                'tag'          => 'CBN Rádio',
                'seo_title'    => 'Novos tratamentos para obesidade: o que mudou na medicina',
                'excerpt'      => 'No programa CBNFloripa da rádio CBN, a Dra. Isis Toledo falou sobre os avanços no tratamento da obesidade.',
                'youtube_id'   => 'CfbcgyOsvTo',
                'image'        => 'midia/cbnfloripa.jpg',
                'content'      => '<p>No programa <strong>#CBNFloripa</strong> da rádio CBN, a Dra. Isis Toledo falou sobre os avanços no tratamento da obesidade e as novas opções terapêuticas disponíveis para os pacientes, com destaque para os novos medicamentos aprovados nos últimos anos.</p>',
            ],
            [
                'title'        => 'A Tarde é Nossa – Causas das mãos inchadas',
                'slug'         => 'a-tarde-e-nossa',
                'date'         => '2022-09-13',
                'tag'          => 'SBT',
                'seo_title'    => 'Mãos inchadas: causas hormonais, renais e metabólicas',
                'excerpt'      => 'No programa A Tarde é Nossa do SBT, a Dra. Isis Toledo explica sobre as possíveis causas para mãos inchadas.',
                'youtube_id'   => '0Ni_VCbPfoY',
                'image'        => 'midia/tarde-e-nossa-maos.jpg',
                'content'      => '<p>No programa <strong>A Tarde é Nossa</strong> do SBT, a Dra. Isis Toledo explicou sobre as possíveis causas para mãos inchadas e o que fazer para aliviar esse sintoma. A médica abordou causas como retenção de líquidos, problemas hormonais, cardíacos e renais.</p>',
            ],
            [
                'title'        => 'A Tarde é Nossa – A importância dos hormônios',
                'slug'         => 'a-tarde-e-nossa-2',
                'date'         => '2022-03-10',
                'tag'          => 'SBT',
                'seo_title'    => 'Como os hormônios afetam o metabolismo, peso e energia',
                'excerpt'      => 'No programa A Tarde é Nossa do SBT, a Dra. Isis Toledo explica sobre a importância do bom funcionamento dos hormônios.',
                'youtube_id'   => 'V109CQpeQWw',
                'image'        => 'midia/tarde-e-nossa-hormonios.jpg',
                'content'      => '<p>No programa <strong>A Tarde é Nossa</strong> do SBT, a Dra. Isis Toledo explicou sobre a importância do bom funcionamento dos hormônios para a saúde e qualidade de vida. A médica abordou como o desequilíbrio hormonal pode impactar o metabolismo, o humor, o sono e o peso corporal.</p>',
            ],
            [
                'title'        => 'SCC News – A importância da insulina para diabéticos',
                'slug'         => 'scc-news',
                'date'         => '2021-01-01',
                'tag'          => 'SBT',
                'seo_title'    => 'Insulina no diabetes: importância e tipos de tratamento',
                'excerpt'      => 'No programa SCC News do SBT, a Dra. Isis Toledo explica sobre a importância da insulina em pessoas diabéticas.',
                'youtube_id'   => 'ytV08dhq7T0',
                'image'        => 'midia/scc-news.jpg',
                'content'      => '<p>No programa <strong>SCC News</strong> do SBT, a Dra. Isis Toledo explicou sobre a importância da insulina em pessoas diabéticas e como o tratamento adequado pode fazer a diferença na qualidade de vida dos pacientes com diabetes tipo 1 e tipo 2.</p>',
            ],
            [
                'title'        => 'SBT Meio Dia – Como as estações do ano afetam nossa disposição',
                'slug'         => 'sbt-meio-dia',
                'date'         => '2020-06-19',
                'tag'          => 'SBT',
                'seo_title'    => 'Estações do ano e disposição: variações metabólicas e hormonais',
                'excerpt'      => 'No programa SBT Meio Dia, a Dra. Isis Toledo explica porque a mudança das estações do ano influencia na nossa disposição e energia.',
                'youtube_id'   => 'KbFvvZymuOo',
                'image'        => 'midia/sbt-meio-dia.jpg',
                'content'      => '<p>No programa <strong>SBT Meio Dia</strong>, a Dra. Isis Toledo explicou como a mudança das estações do ano pode influenciar nossa disposição, energia e humor — e o que fazer para se adaptar melhor a essas variações metabólicas e hormonais.</p>',
            ],
            [
                'title'        => 'SCC SBT – Consumo de álcool na quarentena',
                'slug'         => 'scc-sbt',
                'date'         => '2020-05-15',
                'tag'          => 'SBT',
                'seo_title'    => 'Álcool na quarentena: impactos para o metabolismo e a saúde',
                'excerpt'      => 'Em entrevista à SCC SBT, a Dra. Isis Toledo esclarece dúvidas sobre o consumo de álcool no período de quarentena.',
                'youtube_id'   => 'Da-3EWa4OFY',
                'image'        => 'midia/scc-sbt.jpg',
                'content'      => '<p>Em entrevista à <strong>SCC SBT</strong>, a Dra. Isis Toledo esclareceu dúvidas sobre o consumo de álcool durante o período de quarentena da pandemia de COVID-19, abordando os impactos para a saúde metabólica e dando orientações para quem busca cuidar melhor do corpo nesse período.</p>',
            ],
            [
                'title'        => 'Luz Câmera e Ação – Longevidade',
                'slug'         => 'luz-camera-e-acao',
                'date'         => '2020-04-06',
                'tag'          => 'TV Record News SC',
                'seo_title'    => 'Longevidade: hábitos e estratégias para viver mais e melhor',
                'excerpt'      => 'A Dra. Isis Toledo fala sobre longevidade no programa Luz Câmera e Ação da TV Record News SC.',
                'youtube_id'   => 'evhauqr-xHQ',
                'image'        => 'midia/luz-camera-acao.jpg',
                'content'      => '<p>A Dra. Isis Toledo abordou o tema da <strong>longevidade</strong> no programa <strong>Luz Câmera e Ação</strong> da TV Record News SC, discutindo estratégias e hábitos para uma vida mais longa e com mais qualidade de vida e saúde metabólica.</p>',
            ],
            [
                'title'        => 'NSC TV – Carnaval 2020: Respeito ao Corpo',
                'slug'         => 'nsc-tv',
                'date'         => '2020-02-22',
                'tag'          => 'NSC TV',
                'seo_title'    => 'Respeito ao corpo: como celebrar o Carnaval com saúde',
                'excerpt'      => 'No Carnaval 2020, a Dra. Isis Toledo abordou o assunto "Respeito ao Corpo" na NSC TV.',
                'youtube_id'   => '-0fpgEysfd8',
                'image'        => 'midia/nsc-tv-carnaval.jpg',
                'content'      => '<p>No <strong>Carnaval 2020</strong>, a Dra. Isis Toledo foi à <strong>NSC TV</strong> para abordar um tema fundamental: o <strong>Respeito ao Corpo</strong>. A endocrinologista falou sobre a importância de celebrar sem comprometer a saúde e de manter uma relação positiva com o próprio corpo durante as festividades.</p>',
            ],
            [
                'title'        => 'Jornal do Almoço – Tireóide ao vivo com telespectadores',
                'slug'         => 'jornal-do-almoco',
                'date'         => '2019-10-23',
                'tag'          => 'NSC TV',
                'seo_title'    => 'Tireoide: sintomas, diagnóstico e tratamento das disfunções',
                'excerpt'      => 'No quadro "Quero Saber Já" do Jornal do Almoço, NSC, a Dra. Isis Toledo respondeu ao vivo dúvidas dos telespectadores sobre tireoide.',
                'youtube_id'   => '26lBh0yFQgs',
                'image'        => 'midia/jornal-do-almoco.jpg',
                'content'      => '<p>No quadro <strong>"Quero Saber Já"</strong> do <strong>Jornal do Almoço</strong> da NSC TV, a Dra. Isis Toledo respondeu ao vivo às dúvidas dos telespectadores sobre a tireoide — um dos temas mais questionados quando o assunto é saúde hormonal. A médica explicou sintomas, diagnóstico e tratamento das disfunções da tireoide.</p>',
            ],
            [
                'title'        => "SC no AR – 'Barriga de Chopp': riscos à saúde",
                'slug'         => 'sc-no-ar',
                'date'         => '2019-04-02',
                'tag'          => 'RIC TV',
                'seo_title'    => 'Gordura abdominal: riscos cardiovasculares e metabólicos',
                'excerpt'      => "A Dra. Isis Toledo explica sobre os problemas e riscos referentes à famosa 'barriga de Chopp' no programa SC no AR da RIC TV.",
                'youtube_id'   => 'dpYf0x-p2D8',
                'image'        => 'midia/sc-no-ar.jpg',
                'content'      => '<p>No programa <strong>SC no AR</strong> da RIC TV, a Dra. Isis Toledo explicou sobre os problemas e riscos referentes à famosa <strong>"barriga de Chopp"</strong> — a gordura abdominal que afeta muitos brasileiros e está associada a sérios riscos cardiovasculares, metabólicos e hormonais.</p>',
            ],
            [
                'title'        => 'IDEIAS E NEGÓCIOS – Entrevista sobre o mundo dos negócios',
                'slug'         => 'ideias-e-negocios',
                'date'         => '2017-05-04',
                'tag'          => 'Programa de Negócios',
                'seo_title'    => 'Empreendedorismo na medicina: construindo uma clínica de excelência',
                'excerpt'      => 'Entrevista com a Dra. Isis Toledo sobre o mundo dos negócios, apresentado pela comunicadora Magali Amboni.',
                'youtube_id'   => 'aqDYaVBzT_o',
                'image'        => 'midia/ideias-e-negocios.jpg',
                'content'      => '<p>Entrevista com a Dra. Isis Toledo sobre o <strong>mundo dos negócios</strong>, apresentado pela comunicadora e apresentadora Magali Amboni no programa <strong>IDEIAS E NEGÓCIOS</strong>. A médica compartilhou sua visão sobre empreendedorismo na área da saúde.</p>',
            ],
        ];

        foreach ($posts as $data) {
            $youtubeEmbed = '';
            if ($data['youtube_id']) {
                $youtubeEmbed = <<<HTML

<div class="media-video-embed">
  <iframe
    src="https://www.youtube.com/embed/{$data['youtube_id']}"
    title="{$data['title']}"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen
  ></iframe>
</div>
HTML;
            }

            $post = Post::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'user_id'             => $user->id,
                    'title'               => $data['title'],
                    'excerpt'             => $data['excerpt'],
                    'content'             => $data['content'] . $youtubeEmbed,
                    'featured_image_path' => $data['image'],
                    'status'              => 'published',
                    'published_at'        => $data['date'] . ' 10:00:00',
                    'tag'                 => $data['tag'],
                    'seo_title'           => $data['seo_title'],
                    'seo_description'     => $data['excerpt'],
                ]
            );

            $post->categories()->syncWithoutDetaching([$category->id]);
            $this->command->info("✓ {$data['slug']}");
        }

        $this->command->info('✓ Na Mídia seeder concluído — ' . count($posts) . ' posts processados.');
    }
}
