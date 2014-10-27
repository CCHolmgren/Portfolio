using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model.rules
{
    interface IWinGameStrategy
    {
        bool DidWin(model.Player playerOne, model.Player playerTwo, int maxScore);
    }
}
