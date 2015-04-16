<?php

namespace Calculator;

class WxCalculator extends \wxFrame
{
    protected $calculator;
    protected $prompt;

    public function onQuit()
    {
        $this->Destroy();
    }

    public function onAbout()
    {
        $dlg = new \wxMessageDialog(
            $this,
            "Simple calculator written using wxPHP!",
            "About calculator",
            wxICON_INFORMATION
        );

        $dlg->ShowModal();
    }

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;

        parent::__construct(
            null,
            null,
            "Minimal wxPHP App",
            wxDefaultPosition,
            new \wxSize(450, 500)
        );

        $this->buildMenu();

        $this->buildStatusBar();

        $vbox = new \wxBoxSizer(\wxVERTICAL);
        $vbox->Add($this->buildTextBox(), 0, \wxALL, 10);
        $vbox->Add($this->buildButtons(), 0, \wxALL, 10);
        
        $this->setSizer($vbox);
    }

    protected function buildTextBox()
    {
        $textbox = new \wxTextCtrl(
            $this,
            wxID_ANY,
            "",
            \wxDefaultPosition,
            new \wxSize(400, 40),
            wxTE_READONLY
        );

        $this->prompt = $textbox;

        $vbox = new \wxBoxSizer(\wxVERTICAL);
        $vbox->Add($textbox, 0, \wxALL, 20);
        
        return $vbox;
    }

    protected function buildMenu()
    {
        $menuBar = new \wxMenuBar();

        $menu = new \wxMenu();
        $menu->Append(2, "E&xit", "Quit this program");
        $menuBar->Append($menu, "&File");

        $menu = new \wxMenu();
        $menu->AppendCheckItem(4, "&About...", "Show about dialog");
        $menuBar->Append($menu, "&Help");

        $this->SetMenuBar($menuBar);

        $this->Connect(
            2,
            \wxEVT_COMMAND_MENU_SELECTED,
            array($this, "onQuit")
        );
        $this->Connect(
            4,
            \wxEVT_COMMAND_MENU_SELECTED,
            array($this, "onAbout")
        );
    }

    protected function buildStatusBar()
    {
        $statusBar = $this->CreateStatusBar(2);
        $statusBar->SetStatusText("Welcome to wxCalculator!");
    }

    protected function buildButtons()
    {
        $vbox = new \wxBoxSizer(wxVERTICAL);
        $vbox->Add($this->buildFirstRow(), 0, \wxALL, 10);
        $vbox->Add($this->buildSecondRow(), 0, \wxALL, 10);
        $vbox->Add($this->buildThirdRow(), 0, \wxALL, 10);
        $vbox->Add($this->buildFourthRow(), 0, \wxALL, 10);
        $vbox->Add($this->buildFifthRow(), 0, \wxALL, 10);

        return $vbox;
    }

    protected function buildFirstRow()
    {
        $hbox = new \wxBoxSizer(\wxHORIZONTAL);

        $buttonSeven = new \wxButton(
            $this,
            \wxID_ANY,
            "7",
            new \wxPoint(0, 50),
            \wxDefaultSize,
            0
        );

        $buttonEight = new \wxButton(
            $this,
            \wxID_ANY,
            "8",
            new \wxPoint(0, 50),
            \wxDefaultSize,
            0
        );

        $buttonNine = new \wxButton(
            $this,
            \wxID_ANY,
            "9",
            new \wxPoint(0, 50),
            \wxDefaultSize,
            0
        );

        $buttonDivide = new \wxButton(
            $this,
            wxID_ANY,
            "/",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $hbox->Add($buttonSeven, 0, wxALL, 10);
        $hbox->Add($buttonEight, 0, wxALL, 10);
        $hbox->Add($buttonNine, 0, wxALL, 10);
        $hbox->Add($buttonDivide, 0, wxALL, 10);

        $buttonSeven->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushSeven"
            )
        );
        $buttonEight->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushEight"
            )
        );
        $buttonNine->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushNine"
            )
        );
        $buttonDivide->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushDivide"
            )
        );

        return $hbox;
    }

    protected function buildSecondRow()
    {
        $hbox = new \wxBoxSizer(wxHORIZONTAL);

        $buttonFour = new \wxButton(
            $this,
            wxID_ANY,
            "4",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $buttonFive = new \wxButton(
            $this,
            wxID_ANY,
            "5",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $buttonSix = new \wxButton(
            $this,
            wxID_ANY,
            "6",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );
        $buttonMultiply = new \wxButton(
            $this,
            wxID_ANY,
            "*",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $hbox->Add($buttonFour, 0, wxALL, 10);
        $hbox->Add($buttonFive, 0, wxALL, 10);
        $hbox->Add($buttonSix, 0, wxALL, 10);
        $hbox->Add($buttonMultiply, 0, wxALL, 10);

        $buttonFour->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushFour"
            )
        );
        $buttonFive->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushFive"
            )
        );
        $buttonSix->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushSix"
            )
        );
        $buttonMultiply->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushMyltiply"
            )
        );

        return $hbox;
    }

    protected function buildThirdRow()
    {
        $hbox = new \wxBoxSizer(wxHORIZONTAL);

        $buttonOne = new \wxButton(
            $this,
            wxID_ANY,
            "1",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $buttonTwo = new \wxButton(
            $this,
            wxID_ANY,
            "2",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $buttonThree = new \wxButton(
            $this,
            wxID_ANY,
            "3",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );
        $buttonMinus = new \wxButton(
            $this,
            wxID_ANY,
            "-",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $hbox->Add($buttonOne, 0, wxALL, 10);
        $hbox->Add($buttonTwo, 0, wxALL, 10);
        $hbox->Add($buttonThree, 0, wxALL, 10);
        $hbox->Add($buttonMinus, 0, wxALL, 10);

        $buttonOne->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushOne"
            )
        );
        $buttonTwo->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushTwo"
            )
        );
        $buttonThree->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushThree"
            )
        );
        $buttonMinus->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushMinus"
            )
        );

        return $hbox;
    }

    protected function buildFourthRow()
    {
        $hbox = new \wxBoxSizer(wxHORIZONTAL);

        $buttonZero = new \wxButton(
            $this,
            wxID_ANY,
            "0",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $buttonClear = new \wxButton(
            $this,
            wxID_ANY,
            "C",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $buttonComma = new \wxButton(
            $this,
            wxID_ANY,
            ",",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );
        $buttonPlus = new \wxButton(
            $this,
            wxID_ANY,
            "+",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $hbox->Add($buttonZero, 0, wxALL, 10);
        $hbox->Add($buttonClear, 0, wxALL, 10);
        $hbox->Add($buttonComma, 0, wxALL, 10);
        $hbox->Add($buttonPlus, 0, wxALL, 10);

        $buttonZero->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushZero"
            )
        );
        $buttonClear->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushClear"
            )
        );
        $buttonComma->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushComma"
            )
        );
        $buttonPlus->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushPlus"
            )
        );

        return $hbox;
    }

    protected function buildFifthRow()
    {
        $hbox = new \wxBoxSizer(wxHORIZONTAL);

        $buttonEquals = new \wxButton(
            $this,
            wxID_ANY,
            "=",
            new \wxPoint(0, 50),
            wxDefaultSize,
            0
        );

        $hbox->Add($buttonEquals, 0, wxALL, 10);

        $buttonEquals->Connect(
            wxEVT_COMMAND_BUTTON_CLICKED,
            array(
                $this,
                "pushEquals"
            )
        );

        return $hbox;
    }

    public function pushSeven()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '7');
    }

    public function pushEight()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? '' 
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '8');
    }

    public function pushNine()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '9');
    }

    public function pushFour()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '4');
    }

    public function pushFive()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '5');
    }

    public function pushSix()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '6');
    }

    public function pushOne()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '1');
    }

    public function pushTwo()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '2');
    }

    public function pushThree()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '3');
    }

    public function pushZero()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '0');
    }

    public function pushClear()
    {
        $this->prompt->SetValue('');
        $this->calculator->resetAction();
        $this->calculator->resetNumber();
        $this->calculator->resetResult();
    }

    public function pushComma()
    {
        $value = $this->prompt->GetValue() == 'Err'
            ? ''
            : $this->prompt->GetValue();
        $this->prompt->SetValue($value . '.');
    }

    public function pushEquals()
    {
        $value = $this->prompt->GetValue();

        if (is_numeric($value)) {
            $result = $this->calculator->calculate(floatval($value));
            $this->prompt->SetValue($result);
        } else {
            $this->prompt->SetValue('Err');
        }
    }

    public function pushPlus()
    {
        $value = $this->prompt->GetValue();

        if (is_numeric($value)) {
            $this->calculator->setNumber(floatval($value));
            $result = $this->calculator->setAction('add');
            $this->prompt->SetValue($result);
        } else {
            $this->prompt->SetValue('Err');
        }
    }

    public function pushMinus()
    {
        $value = $this->prompt->GetValue();

        if (is_numeric($value)) {
            $this->calculator->setNumber(floatval($value));
            $result = $this->calculator->setAction('subtract');
            $this->prompt->SetValue($result);
        } else {
            $this->prompt->SetValue('Err');
        }
    }

    public function pushMultiply()
    {
        $value = $this->prompt->GetValue();

        if (is_numeric($value)) {
            $this->calculator->setNumber(floatval($value));
            $result = $this->calculator->setAction('multiply');
            $this->prompt->SetValue($result);
        } else {
            $this->prompt->SetValue('Err');
        }
    }

    public function pushDivide()
    {
        $value = $this->prompt->GetValue();

        if (is_numeric($value)) {
            $this->calculator->setNumber(floatval($value));
            $result = $this->calculator->setAction('divide');
            $this->prompt->SetValue($result);
        } else {
            $this->prompt->SetValue('Err');
        }
    }
}
