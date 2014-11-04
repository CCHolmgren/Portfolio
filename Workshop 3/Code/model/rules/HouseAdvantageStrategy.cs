using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model.rules
{
    class HouseAdvantageStrategy : IWinGameStrategy
    {
        public bool DidWin(model.Player playerOne, model.Player playerTwo, int maxScore)
        {
            if (playerTwo.CalcScore() > maxScore)
            {
                return true;
            }
            else if (playerOne.CalcScore() > maxScore)
            {
                return false;
            }
            return playerOne.CalcScore() >= playerTwo.CalcScore();
        }
    }
}
