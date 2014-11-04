using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.model
{
    class Dealer : Player
    {
        private Deck m_deck = null;
        private const int g_maxScore = 21;

        private rules.INewGameStrategy m_newGameRule;
        private rules.IHitStrategy m_hitRule;
        private rules.IWinGameStrategy m_winRule;


        public Dealer(rules.RulesFactory a_rulesFactory)
        {
            m_newGameRule = a_rulesFactory.GetNewGameRule();
            m_hitRule = a_rulesFactory.GetHitRule();
            m_winRule = a_rulesFactory.GetWinRule();
        }

        public bool NewGame(Player a_player)
        {
            if (m_deck == null || IsGameOver(a_player))
            {
                m_deck = new Deck();
                ClearHand();
                a_player.ClearHand();
                return m_newGameRule.NewGame(m_deck, this, a_player);   
            }
            return false;
        }

        public bool Hit(Player a_player, NewCardListener ncl)
        {
            if (m_deck != null && a_player.CalcScore() < g_maxScore && !IsGameOver(a_player))
            {
                /*Card c;
                c = m_deck.GetCard();
                c.Show(true);
                a_player.DealCard(c);*/
                m_deck.DealCard(true, a_player);
                ncl.CardWasDealt(a_player);
                //Here we should have some sort of Observer notification
                return true;
            }
            return false;
        }

        public bool IsDealerWinner(Player a_player)
        {
            return m_winRule.DidWin(this, a_player, g_maxScore);
            /*
            if (a_player.CalcScore() > g_maxScore)
            {
                return true;
            }
            else if (CalcScore() > g_maxScore)
            {
                return false;
            }
            return CalcScore() >= a_player.CalcScore();*/
        }

        public bool IsGameOver(Player a_player)
        {
            if (a_player.CalcScore() > g_maxScore || m_deck != null && /*CalcScore() >= g_hitLimit*/ m_hitRule.DoHit(this) != true)
            {
                return true;
            }
            return false;
        }
        public void Stand(NewCardListener ncl)
        {
            if (m_deck != null)
            {
                ShowHand();
                ncl.CardWasDealt(this);
            }
            while (m_hitRule.DoHit(this))
            {
                m_deck.DealCard(true, this);
                ncl.CardWasDealt(this);
                //Here we should implement the Observer thingy also
            }
        }
    }
}
