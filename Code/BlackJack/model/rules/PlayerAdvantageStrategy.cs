using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model.rules
{
    class PlayerAdvantageStrategy : IWinGameStrategy
    {
        public bool DidWin(Player playerOne, Player playerTwo, int maxScore)
        {
            if (playerOne.CalcScore() > maxScore)
            {
                return true;
            }
            else if (playerTwo.CalcScore() > maxScore)
            {
                return false;
            }
            return playerTwo.CalcScore() >= playerOne.CalcScore();
        }
    }
}
