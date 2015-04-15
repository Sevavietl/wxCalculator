<?php

namespace Calculator

class WxCalculator extends wxFrame
{
    public function onQuit()
    {
        $this->Destroy();
    }

    public function onAbout()
    {
        $dlg = new wxMessageDialog(
            $this,
            "Simple calculator written using wxPHP!",
            "About calculator",
            wxICON_INFORMATION
        );

        $dlg->ShowModal();
    }

    public function __construct()
    {
        parent::__construct(
            null,
            null,
            "Minimal wxPHP App",
            wxDefaultPosition,
            new wxSize(350, 260)
        );

        $mb = new wxMenuBar();

        $mn = new wxMenu();
        $mn->Append(2, "E&xit", "Quit this program");
        $mb->Append($mn, "&File");

        $mn = new wxMenu();
        $mn->AppendCheckItem(4, "&About...", "Show about dialog");
        $mb->Append($mn, "&Help");

        $this->SetMenuBar($mb);

        $scite = new wxStyledTextCtrl($this);

        $sbar = $this->CreateStatusBar(2);
        $sbar->SetStatusText("Welcome to wxPHP...");

        $this->Connect(2, wxEVT_COMMAND_MENU_SELECTED, array($this,"onQuit"));
        $this->Connect(4, wxEVT_COMMAND_MENU_SELECTED, array($this,"onAbout"));
    }

    protected function buildButtons()
    {
        $vbox = new wxBoxSizer(wxVERTICAL);

        $hbox = new wxBoxSizer(wxHORIZONTAL);

        $button = new wxButton(
            $this,
            wxID_ANY,
            "7",
            new wxPoint(0, 50),
            wxDefaultSize,
            0
        );
    }
}
