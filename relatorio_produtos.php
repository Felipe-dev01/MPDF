<?php

require_once 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$stylesheet = file_get_contents('CSS/style.css');

$produtos = [
    [
        'Cod' => '001',
        'nome' => 'Guitarra Fender Stratocaster',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Guitarra elétrica com corpo em alder e três captadores single-coil.',
        'preco' => 4200.00,
        'Qtd' => 5
    ],
    [
        'Cod' => '002',
        'nome' => 'Amplificador Marshall MG15',
        'categoria' => 'Equipamentos de Áudio',
        'descricao' => 'Amplificador de guitarra com 15W de potência e efeitos integrados.',
        'preco' => 900.00,
        'Qtd' => 10
    ],
    [
        'Cod' => '003',
        'nome' => 'Baixo Elétrico Yamaha TRBX174',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Baixo elétrico de quatro cordas com corpo em alder e braço em maple.',
        'preco' => 1500.00,
        'Qtd' => 7
    ],
    [
        'Cod' => '004',
        'nome' => 'Teclado Roland GO:KEYS',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Teclado portátil com 61 teclas e conectividade Bluetooth.',
        'preco' => 2700.00,
        'Qtd' => 4
    ],
    [
        'Cod' => '005',
        'nome' => 'Bateria Eletrônica Alesis Nitro Mesh',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Bateria eletrônica com peles mesh para uma sensação autêntica.',
        'preco' => 3900.00,
        'Qtd' => 3
    ],
    [
        'Cod' => '006',
        'nome' => 'Microfone Shure SM58',
        'categoria' => 'Acessórios de Áudio',
        'descricao' => 'Microfone dinâmico ideal para vocal e performance ao vivo.',
        'preco' => 800.00,
        'Qtd' => 15
    ],
    [
        'Cod' => '007',
        'nome' => 'Violão Clássico Yamaha C40',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Violão com encordoamento de nylon, perfeito para iniciantes.',
        'preco' => 550.00,
        'Qtd' => 12
    ],
    [
        'Cod' => '008',
        'nome' => 'Controlador MIDI Akai MPK Mini',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Controlador MIDI portátil com 25 teclas e pads de percussão.',
        'preco' => 800.00,
        'Qtd' => 9
    ],
    [
        'Cod' => '009',
        'nome' => 'Fone de Ouvido Profissional Audio-Technica ATH-M50X',
        'categoria' => 'Acessórios de Áudio',
        'descricao' => 'Fone de ouvido com qualidade de estúdio e excelente isolamento.',
        'preco' => 1200.00,
        'Qtd' => 8
    ],
    [
        'Cod' => '010',
        'nome' => 'Pandeiro Contemporânea 10"',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Pandeiro de 10 polegadas com pele de couro e afinador.',
        'preco' => 150.00,
        'Qtd' => 20
    ],
    [
        'Cod' => '011',
        'nome' => 'Violino 4/4 Michael VNM30',
        'categoria' => 'Instrumentos Musicais',
        'descricao' => 'Violino de tamanho completo com arco e estojo.',
        'preco' => 700.00,
        'Qtd' => 6
    ],
    [
        'Cod' => '012',
        'nome' => 'Pedal de Efeito Boss DS-1 Distortion',
        'categoria' => 'Acessórios de Áudio',
        'descricao' => 'Pedal de distorção para guitarra com som clássico.',
        'preco' => 450.00,
        'Qtd' => 18
    ],
    [
        'Cod' => '013',
        'nome' => 'Mesa de Som Behringer Xenyx 802',
        'categoria' => 'Equipamentos de Áudio',
        'descricao' => 'Mesa de som com 8 entradas e pré-amplificadores de qualidade.',
        'preco' => 680.00,
        'Qtd' => 5
    ],
    [
        'Cod' => '014',
        'nome' => 'Cabos P10 Santo Angelo 5m',
        'categoria' => 'Acessórios de Áudio',
        'descricao' => 'Cabo para guitarra e baixo, com 5 metros de comprimento.',
        'preco' => 70.00,
        'Qtd' => 30
    ],
    [
        'Cod' => '015',
        'nome' => 'Caixa Acústica JBL PartyBox 100',
        'categoria' => 'Equipamentos de Áudio',
        'descricao' => 'Caixa de som portátil com bateria e iluminação LED.',
        'preco' => 1700.00,
        'Qtd' => 3
    ]
];


$html = '
    <div style="text-align: center; margin-bottom: 20px;">

        <h1>Catálogo de Produtos ONIX Musical</h1>
        <p>Explore nossa seleção de instrumentos musicais e acessórios de áudio de qualidade.</p>
    <table>
        <tr>
            <th>Cod. do Produto</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Qtd. em Estoque</th>
            
        </tr>
        <tr>';

foreach ($produtos as $produto) {
    $html .= '
            <tr>
                <td>' . $produto['Cod'] . '</td>
                <td>' . $produto['nome'] . '</td>
                <td>' . $produto['categoria'] . '</td>
                <td>R$ ' . $produto['preco'] . '</td>
                <td>' . $produto['descricao'] . '</td>
                <td>' . $produto['Qtd'] . '</td>
                
            </tr>';
}

$html .= '
        </tr>
    </table>
    <p style="text-align: center; margin-top: 20px;">Gerado em: ' . date('d/m/Y H:i:s') . '</p>'; // Adiciona data e hora


$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

// Gerando o PDF
$mpdf->Output();
